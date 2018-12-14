<?php
/**
 * reamaze-php-sdk
 *
 * @author    Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Contacts\CreateParams;

include_once dirname(__FILE__) . './../../autoload.php';

if (is_file(dirname(__FILE__) . './../config.php')) {
    include_once dirname(__FILE__) . './../config.php';
}

include_once dirname(__FILE__) . './../credentials.php';

$reamaze        = new Api(REAMAZE_BRAND, REAMAZE_LOGIN, REAMAZE_TOKEN);
$reamaze->debug = false;

echo "<h3>Example 1</h3>";
echo "<pre>";
try {
    $contact  = new CreateParams(
        [
            'id'    => '123',
            'name'  => 'bob',
            'email' => 'bob@example.com',
            'data'  => [
                'custom_attribute' => 'custom data'
            ]
        ]
    );
    $response = $reamaze->contacts->create($contact);
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
echo "</pre>";

echo "<h3>Example 2</h3>";
echo "<pre>";
try {
    $contact  = new CreateParams(
        [
            'id'     => '123',
            'name'   => 'bob',
            'mobile' => '+12223334444',
            'data'   => [
                'custom_attribute' => 'custom data'
            ]
        ]
    );
    $response = $reamaze->contacts->create($contact);
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
echo "</pre>";
