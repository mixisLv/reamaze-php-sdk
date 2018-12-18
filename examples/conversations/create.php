<?php
/**
 * reamaze-php-sdk
 *
 * @author    Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Conversations\CreateParams;

include_once dirname(__FILE__) . './../../autoload.php';

if (is_file(dirname(__FILE__) . './../config.php')) {
    include_once dirname(__FILE__) . './../config.php';
}

if (!defined('REAMAZE_BRAND')) {
    define('REAMAZE_BRAND', 'your-brand');
}
if (!defined('REAMAZE_LOGIN')) {
    define('REAMAZE_LOGIN', 'your-login');
}
if (!defined('REAMAZE_TOKEN')) {
    define('REAMAZE_TOKEN', 'your-token');
}


$reamaze        = new Api(REAMAZE_BRAND, REAMAZE_LOGIN, REAMAZE_TOKEN);
$reamaze->debug = false;

// Create conversation
try {
    $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             Nullam rutrum cursus arcu, et viverra nisl finibus molestie.";

    $conversation = new CreateParams(
        [
            "subject"  => "new conversation",
            "category" => "support",
            "tagList"  => [
                "API",
                "test",
            ],
            "message"  => [
                "body"                  => $text,
                "recipients"            => ["recipient@example.com"],
                "suppress_notification" => true,
            ],
            "user"     => [
                "name"  => "Lorem Ipsum",
                "email" => "lorem.ipsum@example.com",
            ],
            'data'     => [
                'custom_attribute' => 'custom data',
            ],
        ]
    );
    $response     = $reamaze->conversations->create($conversation);
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
