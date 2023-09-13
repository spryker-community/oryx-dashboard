<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\MostSellingProducts\Persistence;

use Generated\Shared\Transfer\MostSellingProductsFilterTransfer;

interface MostSellingProductsRepositoryInterface
{
    /**
     * @param MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer
     *
     * @return array
     */
    public function findMostSellingProductsByDateRange(MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer): array;
}
