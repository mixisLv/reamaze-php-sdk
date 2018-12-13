<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Contacts\RetrieveParams;
use mixisLv\Reamaze\Params\Contacts\CreateParams;
use mixisLv\Reamaze\Params\Contacts\UpdateParams;

class Contacts extends BaseApi
{
    /**
     * retrieve
     *
     * <code>
     *     $params = new RetrieveParams();
     *     $params->page = 1;
     *     $params->q    = 'example'
     *     $response     = $reamaze->contacts->retrieve($params);
     * </code>
     *
     * @param RetrieveParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_contacts
     *
     */
    public function retrieve(RetrieveParams $params = null)
    {
        return $this->api->call('contacts', 'GET', ['q' => $params->q, 'page' => $params->page]);
    }

    /**
     * create
     *
     * @param CreateParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/post_contacts
     */
    public function create(CreateParams $params)
    {
        return $this->api->call('contacts', 'POST', ['contact' => $params->toArray()]);
    }

    /**
     * update
     *
     * @param  string      $email
     * @param UpdateParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/put_contacts
     */
    public function update($email, UpdateParams $params)
    {
        return $this->api->call('contacts/' . $email, 'PUT', ['contact' => $params->toArray()]);
    }
}
