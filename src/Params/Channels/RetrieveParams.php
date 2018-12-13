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
 * @see     https://www.reamaze.com/api/get_channels
 */
class RetrieveParams extends BaseParams
{
    const CHANNEL_EMAIL    = 'email';
    const CHANNEL_FACEBOOK = 'facebook';
    const CHANNEL_TWITTER  = 'twitter';
    const CHANNEL_CHAT     = 'chat';


    /**
     * Slug will allow you to retrieve a specific channel
     *
     * @var string
     */
    public $slug = '';

    /**
     * Filter channel with email, facebook, twitter, or chat will show only channels by the respective types.
     *
     * @var string
     */
    public $channel = '';



    public static function channelFilters()
    {
        return [
            self::CHANNEL_EMAIL,
            self::CHANNEL_FACEBOOK,
            self::CHANNEL_TWITTER,
            self::CHANNEL_CHAT,
        ];
    }

    public function sanitizeSlug($value)
    {
        return (string)$value;
    }

    public function sanitizeChannel($value)
    {
        return in_array($value, self::channelFilters()) ? $value : '';
    }

}