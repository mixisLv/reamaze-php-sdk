<?php

/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Messages;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class RetrieveParams
 *
 * @package mixisLv\Reamaze\Params\Messages
 * @see     https://www.reamaze.com/api/get_messages
 */
class RetrieveParams extends BaseParams
{
    public const FILTER_STAFF    = 'staff';
    public const FILTER_CUSTOMER = 'customer';

    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var string
     */
    public $slug = '';

    /**
     * The visibility value can be the following values: 0 (Regular) or 1 (Internal Note)
     * or 2 (Collision Detected Message).
     *
     * @var int message visibility
     */
    public $visibility = 0;

    /**
     * @var string
     */
    public $filter = '';

    public static function filters()
    {
        return [
            self::FILTER_STAFF,
            self::FILTER_CUSTOMER,
        ];
    }

    public function sanitizeSlug($value)
    {
        return (string)$value;
    }

    public function sanitizeFilter($value)
    {
        return in_array($value, self::filters()) ? $value : '';
    }
}
