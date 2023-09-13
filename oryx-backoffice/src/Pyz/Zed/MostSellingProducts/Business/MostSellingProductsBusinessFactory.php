<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\MostSellingProducts\Business;

use Pyz\Zed\MostSellingProducts\Business\Reader\MostSellingProductsReader;
use Pyz\Zed\MostSellingProducts\Business\Reader\MostSellingProductsReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\MostSellingProducts\Persistence\MostSellingProductsRepositoryInterface getRepository()
 * @method \Pyz\Zed\MostSellingProducts\MostSellingProductsConfig getConfig()
 */
class MostSellingProductsBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return MostSellingProductsReaderInterface
     */
    public function createMostSellingProductsReader(): MostSellingProductsReaderInterface
    {
        return new MostSellingProductsReader(
            $this->getRepository()
        );
    }
}
