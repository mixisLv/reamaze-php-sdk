<?php

namespace mixisLv\Reamaze;

use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Api\Articles;
use mixisLv\Reamaze\Api\Contacts;
use mixisLv\Reamaze\Api\Conversations;
use mixisLv\Reamaze\Api\Messages;
use mixisLv\Reamaze\Api\Channels;

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
    private $ch;

    /**
     * @var boolean
     */
    public $debug;

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

        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'Reamaze-PHP/1.0 (' . $brand . ')');
        curl_setopt($this->ch, CURLOPT_HEADER, false);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($this->ch, CURLOPT_USERPWD, $this->loginEmail . ":" . $this->apiToken);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, $this->debug);
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 600);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    public function __destruct()
    {
        curl_close($this->ch);
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
        } else {
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
    }

    /**
     * call
     *
     * @param $action
     * @param string $method GET/POST/PUT
     * @param array $params
     *
     * @return string JSON
     * @throws ApiException
     */
    public function call($action, $method, array $params)
    {
        $start  = microtime(true);
        $url    = 'https://' . $this->brand . '.reamaze.com/api/v1/' . $action;
        $isPost = $method == 'POST';
        $isPut  = $method == 'PUT';

        if (!$isPost && !$isPut && !empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        $this->log('Call to: ' . $url);
        $this->log('Params: ' . var_export($params, true));
        if ($this->debug) {
            //$curlBuffer = fopen('php://memory', 'rw+');
            $curlBuffer = fopen('php://temp', 'rw+');
            curl_setopt($this->ch, CURLOPT_STDERR, $curlBuffer);
        }

        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_POST, $isPost ? 1 : 0);
        curl_setopt($this->ch, CURLOPT_VERBOSE, $this->debug);

        if ($isPost || $isPut) {
            $paramsJsonString = json_encode($params);
            if ($this->debug) {
                $this->log('POST/PUT params: ' . $paramsJsonString);
            }
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, $paramsJsonString);
        }

        $responseBody = curl_exec($this->ch);
        $info         = curl_getinfo($this->ch);
        $time         = microtime(true) - $start;
        if ($this->debug) {
            rewind($curlBuffer);
            $this->log(stream_get_contents($curlBuffer));
            fclose($curlBuffer);
        }
        $this->log('Completed in ' . number_format($time * 1000, 2) . 'ms');
        $this->log('Got response: ' . $responseBody);

        if (curl_error($this->ch)) {
            $response['error'] = curl_error($this->ch);
            $this->error(500, $response);
        }
        $response = json_decode($responseBody, true);

        if ($response === null || isset($response['error']) || isset($response['errors']) || floor($info['http_code'] / 100) >= 4) {
            $this->error($info['http_code'], $response);
        }

        return $response;
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
        if (isset($response, $response['errors'])) {
            $errorMsg = implode(', ', array_map(function ($v, $k) { return $k . ': ' . implode(',', $v); }, $response['errors'], array_keys($response['errors'])));
        }
        if (isset($response, $response['error'])) {
            $errorMsg = $response['error'];
        }

        switch ($code) {
            case 404:
                throw new ApiException($errorMsg ? $errorMsg : 'Not found', $code);
                break;
            case 403:
                throw new ApiException($errorMsg ? $errorMsg : 'Forbidden', $code);
                break;
            case 422:
                throw new ApiException($errorMsg ? 'Unprocessable Entity: ' . $errorMsg : 'Unprocessable Entity', $code);
                break;
            case 429:
                throw new ApiException($errorMsg ? $errorMsg : 'Too Many Requests', $code);
                break;
            default:
                throw new ApiException($errorMsg ? $errorMsg : 'Unknown error', $code);
        }
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

}