<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Conversations;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class GetParams
 *
 * @package mixisLv\Reamaze\Params\Channels
 * @see     https://www.reamaze.com/api/get_conversation
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
