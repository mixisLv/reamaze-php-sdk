<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Conversations;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class CreateParams
 *
 * @package mixisLv\Reamaze\Params\Conversations
 * @see     https://www.reamaze.com/api/post_conversations
 */
class CreateParams extends BaseParams
{
    /**
     * @var string conversation subject
     */
    public $subject = '';

    /**
     * The category attribute should be set to the slug of the Channel where this Conversation should be created.
     * The slug is the alphanumeric identifier for a Channel in Reamaze provided by the part before the @ in the
     * Channel Email Address.
     *
     * @var string conversation category
     */
    public $category = '';

    /**
     * You can optionally pass in a tag_list array of strings to tag the conversation.
     * @var array conversation tags
     */
    public $tagList  = [];

    /**
     * array['message']
     *     ['body']      string message body
     *     [recipients]  array (optional) list of additional participants in the conversation
     *     [user]        array conversation author
     *         [name]    string conversation author name
     *         [email]   string conversation author email
     *     [suppress_notification] boolean (optional)
     *
     * You can optionally pass in a message[recipients] array attribute as part of the conversation to pass in
     * additional participants in the conversation. These participants will be automatically added as recipients
     * in future correspondences within the thread.
     * You can optionally pass in a message[suppress_notification] boolean attribute with a value of true to prevent
     * Reamaze from sending any email (or integration) notifications related to this message
     *
     * @var array conversation message (See above)
     */
    public $message  = [];

    /**
     * @var array conversation user
     */
    public $user  = [];

    /**
     * You can optionally pass in a data hash attribute as part of the conversation to pass
     * in custom field attributes for the conversation.
     *
     * @var array custom attributes
     */
    public $data  = [];
}
