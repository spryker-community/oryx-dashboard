<?php

declare(strict_types = 1);

namespace Pyz\Zed\ProductCount\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\ProductCount\Business\ProductCountBusinessFactory getFactory()
 */
class ProductCountFacade extends AbstractFacade implements ProductCountFacadeInterface
{
    public function getActiveProductCount(): int
    {
        return $this->getFactory()->createProductCountReader()->getActiveProductCount();

    }

    public function getInactiveProductCount(): int
    {
        return $this->getFactory()->createProductCountReader()->getInactiveProductCount();
    }
}
