<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\MostSellingProducts\Persistence;

use Generated\Shared\Transfer\MostSellingProductsFilterTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \Pyz\Zed\MostSellingProducts\Persistence\MostSellingProductsPersistenceFactory getFactory()
 */
class MostSellingProductsRepository extends AbstractRepository implements MostSellingProductsRepositoryInterface
{
    /**
     * @param MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer
     *
     * @return array
     */
    public function findMostSellingProductsByDateRange(MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer): array
    {
        return $this->getFactory()->createSalesOrderItemQuery()
            ->filterByCreatedAt_Between(['min' => $mostSellingProductsFilterTransfer->getStartDate(), 'max' => $mostSellingProductsFilterTransfer->getEndDate()])
            ->groupBySku()
            ->withColumn('SUM(quantity)', 'total')
            ->select([
                'sku',
                'total'
            ])
            ->orderBy('total')
            ->limit($mostSellingProductsFilterTransfer->getLimit())
            ->find()
            ->getData();
    }
}
