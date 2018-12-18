<?php
/**
 * reamaze-php-sdk
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Reports\GetParams;

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

echo "<h3>Example 1</h3>";
echo "<pre>";

// Get Volume
try {
    $response = $reamaze->reports->volume();
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}

// Get Response Time
try {
    $response = $reamaze->reports->responseTime();
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}

// Get Staff
try {
    $response = $reamaze->reports->staff();
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}

//Get Tags
try {
    $response = $reamaze->reports->tags();
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}


