<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Channels;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class RetrieveParams
 *
 * @package mixisLv\Reamaze\Params\Channels
 * @see     https://www.reamaze.com/api/get_channel
 */
class GetParams extends BaseParams
{
    /**
     * Slug will allow you to retrieve a specific channel
     *
     * @var string
     */
    public $slug = '';


    public function sanitizeSlug($value)
    {
        return (string)$value;
    }
}
