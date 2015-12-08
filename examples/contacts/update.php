<?php
use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Contacts\UpdateParams;

include_once dirname(__FILE__) . './../autoload.php';

if (is_file(dirname(__FILE__) . './config.php')) {
    include_once dirname(__FILE__) . './config.php';
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

/**
 * @todo "not found" error?
 * @todo can update email?
 */

// Update contact
try {
    $contact  = new UpdateParams(
        [
            'name' => 'My Test Contact 2',
            'data' => [
                'custom_attribute' => 'custom data'
            ]
        ]
    );
    $response = $reamaze->contacts->update('test@example.com', $contact);
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
