<?php
/**
 * reamaze-php-sdk
 *
 * @author    Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 * @copyright Copyright (C) 2016 Mikus Rozenbergs
 * @version   $Id$
 */

use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Contacts\RetrieveParams;

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
try {
    $response = $reamaze->contacts->retrieve();
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
echo "</pre>";

echo "<h3>Example 2</h3>";
echo "<pre>";
try {
    $response = $reamaze->contacts->retrieve(new RetrieveParams(['page' => 2]));
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
echo "</pre>";

echo "<h3>Example 3</h3>";
echo "<pre>";
try {
    $response = $reamaze->contacts->retrieve(new RetrieveParams(['page' => 1, 'q' => 'test@example.com']));
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
