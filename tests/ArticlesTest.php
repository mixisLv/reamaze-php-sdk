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
use mixisLv\Reamaze\Exceptions\ApiException;
use mixisLv\Reamaze\Params\Articles\GetParams;

use PHPUnit\Framework\TestCase;

final class ArticlesTest extends TestCase
{
    /**
     * @expectedException     ApiException
     */
    public function testArticleNotFound()
    {
        $reamaze = new Api(REAMAZE_BRAND, REAMAZE_LOGIN, REAMAZE_TOKEN);
        $reamaze->articles->get(new GetParams(['slug' => 'nonexistent-slug']));
    }
}
