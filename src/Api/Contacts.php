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
     * @see https://www.reamaze.com/api/get_contacts
     *
     * @return mixed
     */
    public function retrieve(RetrieveParams $params = null)
    {
        $page = max(1, (int)$params->page);
        $q    = (string)$params->q;

        return $this->api->call('contacts', 'GET', ['q' => $q, 'page' => $page]);
    }

    public function create(CreateParams $params)
    {
        return $this->api->call('contacts', 'POST', ['contact' => $params->toArray()]);
    }

    public function update($email, UpdateParams $params)
    {
        return $this->api->call('contacts/' . $email, 'PUT', ['contact' => $params->toArray()]);
    }

}