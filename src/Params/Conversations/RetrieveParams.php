<?php

/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Conversations;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class RetrieveParams
 *
 * @package mixisLv\Reamaze\Params\Conversations
 * @see     https://www.reamaze.com/api/get_conversations
 */
class RetrieveParams extends BaseParams
{
    /**
     * Archived conversations
     */
    public const FILTER_ARCHIVED = 'archived';

    /**
     * Unresolved conversations
     */
    public const FILTER_OPEN = 'open';

    /**
     * Unassigned conversations
     */
    public const FILTER_UNASSIGNED = 'unassigned';

    /**
     * All conversations
     */
    public const FILTER_ALL = 'all';

    /**
     * @var int
     */
    public $page = 1;

    /**
     * Filter with archived, open, unassigned, or all will show only Archived, Unresolved, Unassigned
     * or All conversations, respectively.
     *
     * @var string
     */
    public $filter = '';

    /**
     * For with a value matching a known user email will return only conversations relevant to that user.
     * For example, for a customer user, this would be conversations visible to that customer.
     *
     * @var null
     */
    public $for = null;

    /**
     * Sort with a value of updated will return conversations in descending order of last customer update.
     * The default sort order is by conversation create_at.
     *
     * @var null
     */
    public $sort = null;

    /**
     *Tag with string value will return conversations matching specific tags.
     *
     * @var null
     */
    public $tag = null;

    /**
     * Data with a hash of key/value pairs (e.g. data[key]=value) will return conversations
     * with data matchingthose key/value pairs.
     *
     * @var array
     */
    public $data = [];

    /**
     * filters
     *
     * @return array
     */
    public static function filters()
    {
        return [
            self::FILTER_ALL,
            self::FILTER_ARCHIVED,
            self::FILTER_OPEN,
            self::FILTER_UNASSIGNED,
        ];
    }

    public function sanitizeFilter($value)
    {
        return in_array($value, self::filters()) ? $value : '';
    }

    public function sanitizeFor($value)
    {
        return (string)$value;
    }

    public function sanitizeSort($value)
    {
        return (string)$value;
    }

    public function sanitizeTag($value)
    {
        return (string)$value;
    }

    public function sanitizeData($value)
    {
        return (array)$value;
    }
}
