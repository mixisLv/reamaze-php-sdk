<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Articles\RetrieveParams;
use mixisLv\Reamaze\Params\Articles\GetParams;
use mixisLv\Reamaze\Params\Articles\CreateParams;

class Articles extends BaseApi
{
    /**
     * retrieve
     *
     * <code>
     *     $params = new RetrieveParams();
     *     $params->page = 1;
     *     $params->q    = 'example'
     *     $response     = $reamaze->articles->retrieve($params);
     * </code>
     *
     * @param RetrieveParams|null $params
     *
     * @see https://www.reamaze.com/api/get_articles
     *
     * @return mixed
     */
    public function retrieve(RetrieveParams $params = null)
    {
        return $this->api->call(
            ($params->slug ? 'topics/' . $params->slug . '/articles' : 'articles'),
            'GET',
            $params ? $params->paramsArray() : []
        );
    }

    /**
     * get
     *
     * <code>
     *     $params = new GetParams();
     *     $params->slug = 'test';
     *     $response     = $reamaze->articles->get($params);
     * </code>
     *
     * @param GetParams|null $params
     *
     * @see https://www.reamaze.com/api/get_article
     *
     * @return mixed
     */
    public function get(GetParams $params = null)
    {
        return $this->api->call(
            'articles/' . $params->slug,
            'GET',
            []
        );
    }

    /**
     * create
     *
     * <code>
     *     $params = new CreateParams();
     *     $params->slug = 'test';
     *     $response     = $reamaze->articles->create($params);
     * </code>
     *
     * @param CreateParams|null $params
     *
     * @see https://www.reamaze.com/api/get_article
     *
     * @return mixed
     */
    public function create(CreateParams $params = null)
    {
        return $this->api->call(
            ($params->slug ? 'articles/' . $params->slug : 'articles'),
            'POST',
            [
                'article' => [
                    'title'  => $params->title,
                    'body'   => $params->body,
                    'status' => $params->status,
                ]
            ]
        );
    }


}