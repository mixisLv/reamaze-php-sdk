<?php

/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Contacts;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class CreateParams
 *
 * @package mixisLv\Reamaze\Params\Contacts
 * @see     https://www.reamaze.com/api/post_contacts
 */
class CreateParams extends BaseParams
{
    /**
     * Uniquely identifies a contact and should correspond to the id
     * internal to your application or authentication system.
     * @var string
     */
    protected $id = '';

    /**
     * @var string contact name
     */
    protected $name = '';

    /**
     * @var string contact email
     */
    protected $email = '';

    /**
     * @var string contact phone number.
     */
    protected $mobile = '';

    /**
     * @var array custom attributes
     */
    protected $data = [];

    public function sanitizeId($value)
    {
        return (string)$value;
    }

    public function sanitizeName($value)
    {
        return (string)$value;
    }

    public function sanitizeEmail($value)
    {
        return (string)$value;
    }

    public function sanitizeMobile($value)
    {
        return (string)$value;
    }

    public function sanitizeData($value)
    {
        return (array)$value;
    }
}
