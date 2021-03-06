<?php
/**
 * reamaze-php-sdk
 *
 * @author    Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Articles\RetrieveParams;

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
    $response = $reamaze->articles->retrieve();
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
echo "</pre>";

echo "<h3>Example 2</h3>";
echo "<pre>";
try {
    $response = $reamaze->articles->retrieve(new RetrieveParams(['page' => 2]));
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
echo "</pre>";

echo "<h3>Example 3</h3>";
echo "<pre>";
try {
    $response = $reamaze->articles->retrieve(new RetrieveParams(['page' => 1, 'q' => 'test']));
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
echo "</pre>";

echo "<h3>Example 4</h3>";
echo "<pre>";
try {
    $response = $reamaze->articles->retrieve(new RetrieveParams(['slug' => 'test']));
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
echo "</pre>";

echo "<h3>Example 5</h3>";
echo "<pre>";
try {
    $retrieveParams    = new RetrieveParams(['slug' => 'test']);
    $retrieveParams->q = 'test';

    $response = $reamaze->articles->retrieve($retrieveParams);
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
echo "</pre>";
