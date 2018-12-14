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
use mixisLv\Reamaze\Params\Articles\UpdateParams;

class Articles extends BaseApi
{
    /**
     * retrieve
     *
     * <code>
     *     $params = new mixisLv\Reamaze\Params\Articles\RetrieveParams\RetrieveParams();
     *     $params->page = 1;
     *     $params->q    = 'example'
     *     $response     = $reamaze->articles->retrieve($params);
     * </code>
     *
     * @param RetrieveParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_articles
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
     *     $params = new mixisLv\Reamaze\Params\Articles\RetrieveParams\GetParams();
     *     $params->slug = 'test';
     *     $response     = $reamaze->articles->get($params);
     * </code>
     *
     * @param GetParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_article
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
     *     $params = new mixisLv\Reamaze\Params\Articles\RetrieveParams\CreateParams();
     *     $params->slug = 'test';
     *     $response     = $reamaze->articles->create($params);
     * </code>
     *
     * @param CreateParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/post_article
     */
    public function create(CreateParams $params = null)
    {
        return $this->api->call(
            ($params->slug ? 'topics/' . $params->slug . "/articles" : 'articles'),
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

    /**
     * update
     *
     * <code>
     *     $params = new mixisLv\Reamaze\Params\Articles\RetrieveParams\UpdateParams();
     *     $params->slug  = 'test';
     *     $params->title = 'new title';
     *     $params->body  = 'new body';
     *     $response      = $reamaze->articles->update($params);
     * </code>
     *
     * @param UpdateParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/put_article
     */
    public function update(UpdateParams $params = null)
    {
        return $this->api->call(
            'articles/' . $params->slug,
            'PUT',
            [
                'article' => [
                    'title' => $params->title,
                    'body'  => $params->body,
                ]
            ]
        );
    }
}
