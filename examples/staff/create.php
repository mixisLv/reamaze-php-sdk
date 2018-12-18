<?php
/**
 * reamaze-php-sdk
 *
 * @author    Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Staff\CreateParams;

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
    $staff  = new CreateParams(
        [
            'name'  => 'Jean Super Agent',
            'email' => 'jean@example.com',
            'password'  => time(),
        ]
    );

    $response = $reamaze->staff->create($staff);
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
echo "</pre>";


