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

    const FILTER_STAFF    = 'staff';
    const FILTER_CUSTOMER = 'customer';

    /**
     * @var int
     */
    protected $page = 1;

    /**
     * @var string
     */
    protected $slug = '';

    /**
     * The visibility value can be the following values: 0 (Regular) or 1 (Internal Note) or 2 (Collision Detected Message).
     *
     * @var int message visibility
     */
    protected $visibility = 0;

    /**
     * @var string
     */
    protected $filter = '';

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