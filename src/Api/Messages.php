<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Messages\CreateParams as MessagesCreateParams;
use mixisLv\Reamaze\Params\Messages\RetrieveParams as MessagesRetrieveParams;

/**
 * Class Messages
 * @package mixisLv\Reamaze\Api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */
class Messages extends BaseApi
{
    /**
     * getAction
     *
     * @param string $slug
     *
     * @return string
     */
    private function getCreateAction($slug)
    {
        return 'conversations/' . $slug . '/messages';
    }

    /**
     * getRetrieveAction
     *
     * @param string $slug
     *
     * @return string
     */
    private function getRetrieveAction($slug)
    {
        return $slug ? 'conversations/' . $slug . '/messages' : 'messages';
    }

    /**
     * prepareCreateParams
     *
     * @param MessagesCreateParams|null $params
     *
     * @return array
     */
    private function prepareCreateParams(MessagesCreateParams $params = null)
    {
        return [
            'body'                  => $params->body,
            'recipients'            => $params->recipients,
            'user'                  => $params->user,
            'visibility'            => $params->visibility,
            'suppress_notification' => $params->suppressNotification,
            'suppress_autoresolve'  => $params->suppressAutoresolve,
            'attachment'            => $params->attachment,
        ];
    }


    /**
     * prepareRetrieveParams
     *
     * @param MessagesRetrieveParams|null $params
     * @return array
     */
    private function prepareRetrieveParams(MessagesRetrieveParams $params = null)
    {
        return [
            'filter' => $params->filter,
            'page' => $params->page,
            'visibility' => $params->visibility
        ];
    }

    /**
     * Retrieving Messages
     *
     * <code>
     *      $params = new \mixisLv\Reamaze\Params\Messages\RetrieveParams\RetrieveParams(['slug'=> 'new-conversation']);
     *      $response = $reamaze->messages->retrieve($params);
     * </code>
     *
     * @param MessagesRetrieveParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_messages
     */
    public function retrieve(MessagesRetrieveParams $params = null)
    {
        return $this->api->call(
            $this->getRetrieveAction($params->slug),
            'GET',
            $this->prepareRetrieveParams($params)
        );
    }

    /**
     * Creating Messages
     *
     * <code>
     *      $message = new \mixisLv\Reamaze\Params\Messages\CreateParams\CreateParams([
     *          "body"        => "Nullam rutrum cursus arcu, et viverra nisl finibus molestie.",
     *          "recipients"  => ["recipient@example.com"],
     *          "user"        => [
     *              "name"  => "Lorem Ipsum",
     *              "email" => "lorem.ipsum@example.com",
     *          ],
     *      ]);
     *      $response = $reamaze->messages->create('new-conversation', $message);
     * </code>
     *
     * @param string                $slug
     * @param MessagesCreateParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/post_messages
     */
    public function create($slug, MessagesCreateParams $params)
    {
        return $this->api->call(
            $this->getCreateAction($slug),
            'POST',
            ['message' => $this->prepareCreateParams($params)]
        );
    }
}
