<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Messages\CreateParams as MessageCreateParams;
use mixisLv\Reamaze\Params\Messages\RetrieveParams as MessageRetrieveParams;

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
     * @param MessageCreateParams|null $params
     *
     * @return array
     */
    private function prepareCreateParams(MessageCreateParams $params = null)
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
     * retrieve
     *
     * @param MessageRetrieveParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_messages
     */
    public function retrieve(MessageRetrieveParams $params = null)
    {
        return $this->api->call(
            $this->getRetrieveAction($params->slug),
            'GET',
            ['filter' => $params->filter, 'page' => $params->page, 'visibility' => $params->visibility]
        );
    }

    /**
     * create
     *
     * @param                     $slug
     * @param MessageCreateParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/post_messages
     */
    public function create($slug, MessageCreateParams $params)
    {
        return $this->api->call(
            $this->getCreateAction($slug),
            'POST',
            ['message' => $this->prepareCreateParams($params)]
        );
    }
}
