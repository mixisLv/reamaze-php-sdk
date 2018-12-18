<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Contacts;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class CreateIdentitiesParams
 *
 * @property $type
 * @property $identifier
 *
 * @package mixisLv\Reamaze\Params\Contacts
 * @see     https://www.reamaze.com/api/post_identities
 */
class CreateIdentitiesParams extends BaseParams
{
    /**
     * Contacts that have an email.
     */
    const TYPE_EMAIL = 'email';

    /**
     * Contacts that have a phone number.
     */
    const TYPE_MOBILE = 'mobile';

    /**
     * Contacts that have a instagram account.
     */
    const TYPE_INSTAGRAM = 'instagram';

    /**
     * Contacts that have a twitter account.
     */
    const TYPE_TWITTER = 'twitter';

    /**
     * The type value can be the following: 'email', 'mobile', 'instagram', 'twitter'.
     * Currently, adding Facebook identities to a contact is not supported.
     * @var string
     */
    protected $type = '';

    /**
     * @var string
     */
    protected $identifier = '';


    /**
     * Types
     *
     * @return array
     */
    public static function types()
    {
        return [
            self::TYPE_EMAIL,
            self::TYPE_MOBILE,
            self::TYPE_INSTAGRAM,
            self::TYPE_TWITTER,
        ];
    }

    public function sanitizeType($value)
    {
        return (string)(!empty($value) && in_array($value, self::types()) ? $value : '');
    }

    public function sanitizeIdentifier($value)
    {
        return (string)$value;
    }
}
