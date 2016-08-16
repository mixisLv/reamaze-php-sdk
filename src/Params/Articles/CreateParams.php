<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Articles;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class CreateParams
 *
 * @property $slug
 * @property $title
 * @property $body
 * @property $status
 *
 * @package mixisLv\Reamaze\Params\Articles
 * @see     https://www.reamaze.com/api/post_article
 */
class CreateParams extends BaseParams
{

    /**
     * Published article
     */
    const STATUS_PUBLISHED = 0;

    /**
     * Draft article
     */
    const STATUS_DRAFT = 1;

    /**
     * Internal article
     */
    const STATUS_INTERNAL = 4;

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

    /**
     * @var string
     */
    protected $status = self::STATUS_PUBLISHED;

    /**
     * Statuses
     *
     * @return array
     */
    public static function statuses()
    {
        return [
            self::STATUS_PUBLISHED,
            self::STATUS_DRAFT,
            self::STATUS_INTERNAL,
        ];
    }

    public function sanitizeStatus($value)
    {
        return (string)in_array($value, self::statuses()) ? $value : self::STATUS_PUBLISHED;
    }

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