<?php
/**
 * reamaze-php-sdk
 *
 * @author    Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Articles\CreateParams;

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
    $params = new CreateParams();

    $params->title = 'Article title';
    $params->body  = 'Article without slug';

    $response = $reamaze->articles->create($params);
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}

echo "</pre>";

echo "<h3>Example 2</h3>";
echo "<pre>";

try {
    $params = new CreateParams(['slug' => 'article-topic']);

    $params->title = 'Article title';
    $params->body  = 'Article with topic';

    $response = $reamaze->articles->create($params);
    var_dump($response);
} catch (ApiException $e) {
    var_dump($e->getMessage());
}
echo "</pre>";
