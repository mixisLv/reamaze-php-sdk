<?php
/*
 * This file is part of the Comparator package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\Comparator;

use mixisLv\Reamaze\Api;
use mixisLv\Reamaze\Params\Articles\GetParams;

use PHPUnit\Framework\TestCase;

final class ArticlesTest extends TestCase
{
    private $brand      = 'REAMAZE-BRAND';
    private $loginEmail = 'REAMAZE-LOGIN';
    private $apiToken   = 'REAMAZE-TOKEN';

    /**
     * @expectedException     \mixisLv\Reamaze\Exceptions\ApiException
     */
    public function testArticleNotFound()
    {
        $reamaze = new Api($this->brand, $this->loginEmail, $this->apiToken);
        $reamaze->articles->get(new GetParams(['slug' => 'nonexistent-slug']));
    }
}
