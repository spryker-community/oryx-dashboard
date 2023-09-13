<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\MostSellingProducts\Business;

use Generated\Shared\Transfer\MostSellingProductsFilterTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\MostSellingProducts\Business\MostSellingProductsBusinessFactory getFactory()
 */
class MostSellingProductsFacade extends AbstractFacade implements MostSellingProductsFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer
     *
     * @return array
     */
    public function getMostSellingProductsByDate(MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer): array
    {
        return $this->getFactory()
            ->createMostSellingProductsReader()
            ->getMostSellingProductsByDateRange($mostSellingProductsFilterTransfer);
    }
}
