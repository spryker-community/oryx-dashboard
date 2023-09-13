<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\MostSellingProducts\Business;

use Generated\Shared\Transfer\MostSellingProductsFilterTransfer;

interface MostSellingProductsFacadeInterface
{
    /**
     * Specification:
     * - TBD
     *
     * @param MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer
     *
     * @return array
     */
    public function getMostSellingProductsByDate(MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer): array;
}
