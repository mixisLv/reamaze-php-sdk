<?php

/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Staff\CreateParams;
use mixisLv\Reamaze\Params\Staff\RetrieveParams;

/**
 * Class Staff
 * @package mixisLv\Reamaze\Api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */
class Staff extends BaseApi
{
    /**
     * Retrieving Staff
     *
     * <code>
     *      $response = $reamaze->staff->retrieve();
     * </code>
     *
     * @param RetrieveParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_staff
     */
    public function retrieve(RetrieveParams $params = null)
    {
        $params = $params ?: new RetrieveParams();

        return $this->api->call('staff', 'GET', $params->toArray());
    }

    /**
     * Create Staff User
     *
     * <code>
     *      $staff  = new CreateParams(
     *          ['name'  => 'Jean Super Agent', 'email' => 'jean@example.com', 'password'  => time()]
     *      );
     *      $response = $reamaze->staff->create();
     * </code>
     *
     * @param CreateParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/post_staff
     */
    public function create(CreateParams $params)
    {
        return $this->api->call('staff', 'POST', ['staff' => $params->toArray()]);
    }
}
