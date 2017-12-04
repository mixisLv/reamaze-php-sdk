<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Articles;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class UpdateParams
 *
 * @property $slug
 * @property $title
 * @property $body
 *
 * @package mixisLv\Reamaze\Params\Articles
 * @see     https://www.reamaze.com/api/put_article
 */
class UpdateParams extends BaseParams
{
    /**
     * @var string
     */
    protected $slug = '';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $body = '';

    public function sanitizeSlug($value)
    {
        return (string)$value;
    }

    public function sanitizeTitle($value)
    {
        return (string)$value;
    }

    public function sanitizeBody($value)
    {
        return (string)$value;
    }
}