<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Articles;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class RetrieveParams
 *
 * @property $page
 * @property $status
 * @property $slug
 * @property $q
 *
 * @package mixisLv\Reamaze\Params\Articles
 * @see     https://www.reamaze.com/api/get_articles
 */
class RetrieveParams extends BaseParams
{
    /**
     * Published articles
     */
    const STATUS_PUBLISHED = 'published';

    /**
     * Draft articles
     */
    const STATUS_DRAFT = 'draft';

    /**
     * Internal articles
     */
    const STATUS_INTERNAL = 'internal';

    /**
     * @var int
     */
    protected $page = 1;

    /**
     * Status with published, draft, or internal will show only Published, Draft, or Internal articles respectively.
     *
     * @var string
     */
    protected $status = '';

    /**
     * @var string
     */
    protected $slug = '';

    /**
     * @var string with any string will search over articles by keywords.
     */
    protected $q = '';

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

    /**
     * paramsArray
     *
     * @return array
     */
    public function paramsArray()
    {
        $params = [];
        if (!empty($this->status)) {
            $params['status'] = $this->status;
        }
        if (!empty($params->page)) {
            $params['page'] = $this->page;
        }
        if (!empty($params->q)) {
            $params['q'] = $this->q;
        }
        return $params;
    }


    public function sanitizeStatus($value)
    {
        return (string)in_array($value, self::statuses()) ? $value : self::STATUS_PUBLISHED;
    }

    public function sanitizeSlug($value)
    {
        return (string)$value;
    }

    public function sanitizeQ($value)
    {
        return (string)$value;
    }
}
