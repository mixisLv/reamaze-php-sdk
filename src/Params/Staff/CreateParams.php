<?php

/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Staff;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class CreateParams
 *
 * @property $slug
 * @property $title
 * @property $body
 * @property $status
 *
 * @package mixisLv\Reamaze\Params\Staff
 * @see     https://www.reamaze.com/api/post_staff
 */
class CreateParams extends BaseParams
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var string
     */
    protected $password = '';



    public function sanitizeName($value)
    {
        return (string)$value;
    }

    public function sanitizeEmail($value)
    {
        return (string)$value;
    }

    public function sanitizePassword($value)
    {
        return (string)$value;
    }
}
