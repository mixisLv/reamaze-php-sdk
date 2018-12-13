<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Conversations\CreateParams as ConversationsCreateParams;
use mixisLv\Reamaze\Params\Conversations\RetrieveParams as ConversationsRetrieveParams;

class Conversations extends BaseApi
{
    /**
     * prepareCreateParams
     *
     * @param ConversationsCreateParams|null $params
     *
     * @return array
     */
    private function prepareCreateParams(ConversationsCreateParams $params = null)
    {
        return [
            'subject'   => $params->subject,
            'category'   => $params->category,
            'tag_list'   => $params->tagList,
            'message'   => $params->message,
            'user'   => $params->user,
            'data '   => $params->data,
        ];
    }

    /**
     * prepareRetrieveParams
     *
     * @param ConversationsRetrieveParams|null $params
     *
     * @return array
     */
    private function prepareRetrieveParams(ConversationsRetrieveParams $params = null)
    {
        return [
            'page'   => $params->page,
            'filter' => $params->filter,
            'for'    => $params->for,
            'sort'   => $params->sort,
            'tag'    => $params->tag,
            'data'   => $params->data,
        ];
    }

    /**
     * retrieve
     *
     * @param ConversationsRetrieveParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_conversations
     */
    public function retrieve(ConversationsRetrieveParams $params = null)
    {
        return $this->api->call(
            'conversations',
            'GET',
            $this->prepareRetrieveParams($params)
        );
    }

    /**
     * create
     *
     * @param ConversationsCreateParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/post_conversations
     */
    public function create(ConversationsCreateParams $params)
    {
        return $this->api->call(
            'conversations',
            'POST',
            ['conversation' => $this->prepareCreateParams($params)]
        );
    }
}
