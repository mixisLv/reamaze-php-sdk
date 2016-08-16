<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Articles;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class GetParams
 *
 * @property $slug
 *
 * @package mixisLv\Reamaze\Params\Articles
 * @see     https://www.reamaze.com/api/get_article
 */
class GetParams extends BaseParams
{
    /**
     * @var string
     */
    protected $slug = '';

    public function sanitizeSlug($value)
    {
        return (string)$value;
    }
}