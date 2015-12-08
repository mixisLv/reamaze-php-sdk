<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Contacts;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class RetrieveParams
 *
 * @package mixisLv\Reamaze\Params\Contacts
 * @see     https://www.reamaze.com/api/get_contacts
 */
class RetrieveParams extends BaseParams
{
    /**
     * @var int
     */
    protected $page = 1;

    /**
     * @var string with any string will search over contacts by name or email
     */
    protected $q = '';

    public function sanitizeQ($value)
    {
        return (string)$value;
    }

}