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
 * @property $page
 * @property $q
 * @property $data
 * @property $sort
 * @property $type
 *
 * @package mixisLv\Reamaze\Params\Contacts
 * @see     https://www.reamaze.com/api/get_contacts
 */
class RetrieveParams extends BaseParams
{
    /**
     * Contacts that have an email
     */
    const TYPE_EMAIL = 'email';

    /**
     * Contacts that have a phone number
     */
    const TYPE_MOBILE = 'mobile';

    /**
     * @var int
     */
    protected $page = 1;

    /**
     * @var string with any string will search over contacts by name or email
     */
    protected $q = '';

    /**
     * @var array with a hash of key/value pairs (e.g. `data[key]=value`) will return contacts with `data` matching those key/value pairs.
     */
    protected $data = [];

    /**
     * @var string with value set to `date` will return results in descending order of create time. The default sort when this parameter is not provided is by name.
     */
    protected $sort = '';

    /**
     * @var string with values set to `email` or `mobile` will return only contacts that have an email address or phone number, respectively.
     */
    protected $type = '';

    /**
     * Types
     *
     * @return array
     */
    public static function types()
    {
        return [
            self::TYPE_EMAIL,
            self::TYPE_MOBILE,
        ];
    }


    public function sanitizeQ($value)
    {
        return (string)$value;
    }

    public function sanitizeData($value)
    {
        return (array)$value;
    }

    public function sanitizeSort($value)
    {
        return (string)$value;
    }

    public function sanitizeType($value)
    {
        return (string)(!empty($value) && in_array($value, self::types()) ? $value : '');
    }
}