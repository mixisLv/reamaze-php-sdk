<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Messages;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class CreateParams
 *
 * @package mixisLv\Reamaze\Params\Messages
 * @see     https://www.reamaze.com/api/post_messages
 */
class CreateParams extends BaseParams
{
    /**
     * @var string message body
     */
    public $body  = '';

    /**
     * Pass in additional participants in the conversation. These participants will be automatically
     * added as recipients in future correspondences within the thread.
     *
     * @var array (optional) list of additional participants in the conversation
     */
    public $recipients = [];

    /**
     * array['user']
     *     [name]    string conversation author name
     *     [email]   string conversation author email
     *
     * @var array conversation author (See above)
     */
    public $user = [];

    /**
     * The visibility value can be the following values: 0 (Regular) or 1 (Internal Note).
     *
     * @var int message visibility
     */
    public $visibility = 0;

    /**
     * @var bool (optional) true to prevent Reamaze from sending any email (or integration)
     * notifications related to this message
     */
    public $suppressNotification = false;

    /**
     * @var bool (optional) true to prevent Reamaze from marking the conversation as resolved
     * when message[user] is a staff user.
     **/
    public $suppressAutoresolve  = false;

    /**
     * @var string (optional) You can optionally pass in an attachment string attribute with a URL
     * to attach a file to the message. The URL should specify a valid location where Reamaze can fetch the file.
     */
    public $attachment = null;
}
