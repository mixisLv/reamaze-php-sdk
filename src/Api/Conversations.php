<?php

/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Conversations\CreateParams as ConversationsCreateParams;
use mixisLv\Reamaze\Params\Conversations\GetParams as ConversationGetParams;
use mixisLv\Reamaze\Params\Conversations\RetrieveParams as ConversationsRetrieveParams;

/**
 * Class Conversations
 * @package mixisLv\Reamaze\Api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */
class Conversations extends BaseApi
{
    /**
     * getAction
     *
     * @param string $slug
     * @return string
     */
    private function getAction($slug = null)
    {
        return 'conversations' . ($slug ? '/' . $slug : '');
    }

    /**
     * prepareCreateParams
     *
     * @param ConversationsCreateParams $params
     *
     * @return array
     */
    private function prepareCreateParams(ConversationsCreateParams $params)
    {
        return [
            'subject'  => $params->subject,
            'category' => $params->category,
            'tag_list' => $params->tagList,
            'message'  => $params->message,
            'user'     => $params->user,
            'data '    => $params->data,
        ];
    }

    /**
     * prepareRetrieveParams
     *
     * @param ConversationsRetrieveParams $params
     *
     * @return array
     */
    private function prepareRetrieveParams(ConversationsRetrieveParams $params)
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
     * Retrieving Conversations
     *
     * <code>
     *      $params = new \mixisLv\Reamaze\Params\Conversations\RetrieveParams([
     *          'filter'=> RetrieveParams::FILTER_ALL
     *      ]);
     * $response = $reamaze->conversations->retrieve($params);
     * </code>
     *
     * @param ConversationsRetrieveParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_conversations
     */
    public function retrieve(ConversationsRetrieveParams $params = null)
    {
        $params = $params ?: new ConversationsRetrieveParams();
        $action = $this->getAction();

        return $this->api->call(
            $action,
            'GET',
            $this->prepareRetrieveParams($params)
        );
    }

    /**
     * Get Conversation
     *
     * <code>
     *      $params = new \mixisLv\Reamaze\Params\Conversations\GetParams(['slug'   => 'support']);
     *      $response = $reamaze->channels->conversations($params);
     * </code>
     *
     * @param ConversationGetParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_conversation
     */
    public function get(ConversationGetParams $params)
    {
        $action  = $this->getAction($params->slug);
        return $this->api->call(
            $action,
            'GET',
            []
        );
    }

    /**
     * Creating Conversations
     *
     * @param ConversationsCreateParams $params
     * <code>
     *      $conversation = new \mixisLv\Reamaze\Params\Conversations\CreateParams([
     *          "subject"  => "new conversation",
     *          "category" => "support",
     *          "tagList"  => ["API", "test"],
     *          "message"  => [
     *              "body"        => "Nullam rutrum cursus arcu, et viverra nisl finibus molestie.",
     *              "recipients"  => ["recipient@example.com"],
     *          ],
     *          "user"     => [
     *              "name"  => "Lorem Ipsum",
     *              "email" => "lorem.ipsum@example.com",
     *          ]
     *      ]);
     *      $response     = $reamaze->conversations->create($conversation);
     * </code>
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
