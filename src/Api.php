<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze;

use mixisLv\Reamaze\Api\Articles;
use mixisLv\Reamaze\Api\Channels;
use mixisLv\Reamaze\Api\Contacts;
use mixisLv\Reamaze\Api\Conversations;
use mixisLv\Reamaze\Api\Messages;
use mixisLv\Reamaze\Exceptions\ApiException;

/**
 * Class Api
 *
 * @package mixisLv\Reamaze
 *
 * @property Articles $articles
 * @property Contacts $contacts
 * @property Conversations $conversations
 * @property Messages $messages
 * @property Channels $channels
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */
class Api
{

    /**
     * @var boolean
     */
    public $debug;
    /**
     * @var string Reamaze brand
     */
    private $brand;
    /**
     * @var string Reamaze login email
     */
    private $loginEmail;
    /**
     * @var string Reamaze token
     */
    private $apiToken;
    /**
     * @var resource cURL handle
     */
    private $curl;

    /**
     * @param string $brand your Reamaze brand
     * @param string $loginEmail your Reamaze login email
     * @param string $apiToken your Reamaze API token
     */
    public function __construct($brand, $loginEmail, $apiToken)
    {
        $this->brand      = $brand;
        $this->loginEmail = $loginEmail;
        $this->apiToken   = $apiToken;

        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_USERAGENT, 'mixisLv/reamaze-php-sdk v2.0 (' . $brand . ')');
        curl_setopt($this->curl, CURLOPT_HEADER, false);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Content-Type: application/json']);
        curl_setopt($this->curl, CURLOPT_USERPWD, $this->loginEmail . ":" . $this->apiToken);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, $this->debug);
        curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 600);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

    /**
     * __get
     *
     * @param $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }

        switch ($property) {
            case 'articles':
                $this->$property = new Articles($this);
                break;
            case 'contacts':
                $this->$property = new Contacts($this);
                break;
            case 'conversations':
                $this->$property = new Conversations($this);
                break;
            case 'messages':
                $this->$property = new Messages($this);
                break;
            case 'channels':
                $this->$property = new Channels($this);
                break;
        }

        return isset($this->$property) ? $this->$property : null;
    }

    /**
     * call
     *
     * @param $action
     * @param string $method GET/POST/PUT
     * @param array $params
     *
     * @return \stdClass
     * @throws ApiException
     */
    public function call($action, $method, array $params)
    {
        $start  = microtime(true);
        $isPost = $method == 'POST';
        $isPut  = $method == 'PUT';
        $url    = $this->getUrl($action, $method, $params);

        $this->log('Call to: ' . $url);
        $this->log('Params: ' . var_export($params, true));
        if ($this->debug) {
            //$curlBuffer = fopen('php://memory', 'rw+');
            $curlBuffer = fopen('php://temp', 'rw+');
            curl_setopt($this->curl, CURLOPT_STDERR, $curlBuffer);
        }

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_POST, $isPost ? 1 : 0);
        curl_setopt($this->curl, CURLOPT_VERBOSE, $this->debug);

        if ($isPost || $isPut) {
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->paramsToJson($params));
        }

        $responseBody = curl_exec($this->curl);
        $info         = curl_getinfo($this->curl);
        $time         = microtime(true) - $start;
        if ($this->debug) {
            rewind($curlBuffer);
            $this->log(stream_get_contents($curlBuffer));
            fclose($curlBuffer);
        }
        $this->log('Completed in ' . number_format($time * 1000, 2) . 'ms');
        $this->log('Got response: ' . $responseBody);

        $curlError = curl_error($this->curl);

        if ($curlError) {
            $response['error'] = $curlError;
            $this->error(500, $response);
        }
        $response = json_decode($responseBody, false);

        if ($this->isError($response, $info['http_code'])) {
            $this->error($info['http_code'], $response !== null ? $response : $responseBody);
        }

        return $response;
    }

    private function getUrl($action, $method, $params)
    {
        $url = 'https://' . $this->brand . '.reamaze.io/api/v1/' . $action;

        if (!in_array($method, ['POST', 'PUT']) && !empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        return $url;
    }

    /**
     * log
     *
     * @param string $message
     */
    protected function log($message)
    {
        if ($this->debug) {
            echo '<pre>', $message, '</pre>';
        }
    }

    private function paramsToJson($params)
    {
        $paramsJsonString = json_encode($params);
        if ($this->debug) {
            $this->log('POST/PUT params: ' . $paramsJsonString);
        }

        return $paramsJsonString;
    }

    /**
     * error
     *
     * @param $code
     * @param $response
     *
     * @throws ApiException
     */
    public function error($code, $response)
    {
        $errorMsg = false;
        if (isset($response, $response->errors)) {
            $errorMsg = $this->implodeErrors((array)$response->errors);
        }
        if (isset($response, $response->error)) {
            $errorMsg = $response->error;
        }
        if (is_string($response)) {
            $errorMsg = $response;
        }

        $message = $this->errorMessage($code, $errorMsg);

        throw new ApiException($message, $code);
    }

    /**
     * implodeErrors
     *
     * @param array $errors
     * @return string
     */
    private function implodeErrors(array $errors)
    {
        return implode(
            ', ',
            array_map(
                function ($value, $key) {
                    return $key . ': ' . implode(',', $value);
                },
                (array)$errors,
                array_keys((array)$errors)
            )
        );
    }

    /**
     * errorMessage
     *
     * @param $code
     * @param $errorMsg
     * @return mixed|string
     */
    private function errorMessage($code, $errorMsg)
    {
        $errorCodes = [
            0   => 'Unknown error',
            404 => 'Not found',
            403 => 'Forbidden',
            429 => 'Too Many Requests',
            422 => 'Unprocessable Entity',
        ];

        switch ($code) {
            case 404:
            case 403:
            case 429:
                $message = $errorMsg ? $errorMsg : $errorCodes[$code];
                break;
            case 422:
                $message = $errorMsg ? 'Unprocessable Entity: ' . $errorMsg : $errorCodes[$code];
                break;
            default:
                $message = $errorMsg ? $errorMsg : $errorCodes[0];
        }

        return $message;
    }

    /**
     * isError
     *
     * @param $response
     * @param $httpCode
     * @return bool
     */
    private function isError($response, $httpCode)
    {
        $error = false;
        if ($response === null
            ||
            isset($response->error)
            ||
            isset($response->errors)
            ||
            floor($httpCode / 100) >= 4
        ) {
            $error = true;
        }

        return $error;
    }
}
