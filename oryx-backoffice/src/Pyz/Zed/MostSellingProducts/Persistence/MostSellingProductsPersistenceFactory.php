<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\MostSellingProducts\Persistence;

use Orm\Zed\Sales\Persistence\SpySalesOrderItemQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \Pyz\Zed\MostSellingProducts\MostSellingProductsConfig getConfig()
 * @method \Pyz\Zed\MostSellingProducts\Persistence\MostSellingProductsRepositoryInterface getRepository()
 */
class MostSellingProductsPersistenceFactory extends AbstractPersistenceFactory
{
    public function createSalesOrderItemQuery(): SpySalesOrderItemQuery
    {
        return SpySalesOrderItemQuery::create();
    }
}
