<?php
/**
 * reamaze-php-sdk
 *
 * @author    Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Messages\CreateParams;

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

// Create message
try {
    $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             Nullam rutrum cursus arcu, et viverra nisl finibus molestie.";

    /** @var CreateParams $message */
    $message = new CreateParams(
        [
            "body"                  => $text,
            "recipients"            => ["recipient@example.com"],
            "suppressNotification"  => true,
            "suppressAutoresolve"   => true,
            "user"                  => [
                "name"  => "Lorem Ipsum",
                "email" => "lorem.ipsum@example.com",
            ],
        ]
    );

    $response = $reamaze->messages->create('new-conversation', $message);
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e);
}
