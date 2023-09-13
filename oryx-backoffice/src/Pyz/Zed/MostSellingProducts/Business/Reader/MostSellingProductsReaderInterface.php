<?php

namespace Pyz\Zed\MostSellingProducts\Business\Reader;

use Generated\Shared\Transfer\MostSellingProductsFilterTransfer;

interface MostSellingProductsReaderInterface
{
    /**
     * @param MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer
     *
     * @return array
     */
    public function getMostSellingProductsByDateRange(MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer): array;
}
