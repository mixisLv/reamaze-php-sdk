<?php

/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Staff;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class RetrieveParams
 *
 * @property $page
 *
 * @package mixisLv\Reamaze\Params\Staff
 * @see     https://www.reamaze.com/api/get_staff
 */
class RetrieveParams extends BaseParams
{
    /**
     * @var int
     */
    protected $page = 1;
}
