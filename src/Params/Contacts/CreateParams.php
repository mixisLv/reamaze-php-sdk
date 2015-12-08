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
     * @var string contact name
     */
    protected $name = '';

    /**
     * @var string contact email
     */
    protected $email = '';

    /**
     * @var array custom attributes
     */
    protected $data = [];

    public function sanitizeName($value)
    {
        return (string)$value;
    }

    public function sanitizeEmail($value)
    {
        return (string)$value;
    }

    public function sanitizeData($value)
    {
        return (array)$value;
    }
}
