<?php

/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Contacts\CreateIdentitiesParams;
use mixisLv\Reamaze\Params\Contacts\RetrieveParams;
use mixisLv\Reamaze\Params\Contacts\CreateParams;
use mixisLv\Reamaze\Params\Contacts\UpdateParams;

class Contacts extends BaseApi
{
    /**
     * Retrieving Contacts
     *
     * <code>
     *     $params = new \mixisLv\Reamaze\Params\Contacts\RetrieveParams();
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
     * Create Contacts
     *
     * <code>
     *      $contact  = new \mixisLv\Reamaze\Params\Contacts\CreateParams([
     *          'id'    => '123',
     *          'name'  => 'bob',
     *          'email' => 'bob@example.com',
     *      ]);
     *      $response = $reamaze->contacts->create($contact);
     * </code>
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
     * Update Contacts
     *
     * <code>
     *      $contact  = new \mixisLv\Reamaze\Params\Contacts\UpdateParams([
     *          'name' => 'My Test Contact 2'
     *      ]);
     *      $response = $reamaze->contacts->update('recipient@example.com', $contact);
     * </code>
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

    /**
     * Get Contact Identities
     *
     * <code>
     *      $response = $reamaze->contacts->getIdentities('recipient@example.com');
     * </code>
     *
     * @param  string      $email
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_identities
     */
    public function getIdentities($email)
    {
        return $this->api->call('contacts/' . $email . '/identities', 'GET', []);
    }

    /**
     * Create Identities
     *
     * <code>
     *      $identity = new \mixisLv\Reamaze\Params\Contacts\CreateIdentitiesParams([
     *          'type'       => \mixisLv\Reamaze\Params\Contacts\CreateIdentitiesParams::TYPE_MOBILE,
     *          'identifier' => '+99999999999',
     *      ]);
     *
     *      $response = $reamaze->contacts->createIdentities('recipient@example.com', $identity);
     * </code>
     *
     * @param  string $email
     * @param CreateIdentitiesParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/post_identities
     */
    public function createIdentities($email, CreateIdentitiesParams $params)
    {
        return $this->api->call(
            'contacts/' . $email . '/identities',
            'POST',
            ['identity' => $params->toArray()]
        );
    }
}
