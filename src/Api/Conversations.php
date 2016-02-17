<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Conversations\CreateParams;
use mixisLv\Reamaze\Params\Conversations\RetrieveParams;


class Conversations extends BaseApi
{
    /**
     * retrieve
     *
     * @param RetrieveParams|null $params
     *
     * @return string
     */
    public function retrieve(RetrieveParams $params = null)
    {
        return $this->api->call('conversations', 'GET', ['page' => $params->page, 'filter' => $params->filter, 'for' => $params->for, 'sort' => $params->sort, 'tag' => $params->tag, 'data' => $params->data]);
    }

    /**
     * create
     *
     * @param CreateParams $params
     *
     * @return string
     */
    public function create(CreateParams $params)
    {
        return $this->api->call('conversations', 'POST', ['conversation' => $params->toArray()]);
    }

}