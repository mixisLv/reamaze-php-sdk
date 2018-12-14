<?php
/**
 * reamaze-php-sdk
 *
 * @author    Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Contacts\UpdateParams;

include_once dirname(__FILE__) . './../../autoload.php';

if (is_file(dirname(__FILE__) . './../config.php')) {
    include_once dirname(__FILE__) . './../config.php';
}

include_once dirname(__FILE__) . './../credentials.php';

$reamaze        = new Api(REAMAZE_BRAND, REAMAZE_LOGIN, REAMAZE_TOKEN);
$reamaze->debug = true;

/**
 * @todo "not found" error?
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
    $response = $reamaze->contacts->update('recipient@example.com', $contact);
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
