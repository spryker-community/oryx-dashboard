<?php

declare(strict_types = 1);

namespace Pyz\Zed\ProductCount\Business;

use Pyz\Zed\ProductCount\Business\Reader\ProductCountReader;
use Pyz\Zed\ProductCount\Business\Reader\ProductCountReaderInterface;
use Pyz\Zed\ProductCount\ProductCountDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

/**
 * @method \Pyz\Zed\ProductCount\ProductCountConfig getConfig()
 */
class ProductCountBusinessFactory extends AbstractBusinessFactory
{
    public function createProductCountReader(): ProductCountReaderInterface
    {
        return new ProductCountReader($this->getProductFacade());
    }

    private function getProductFacade(): ProductFacadeInterface
    {
        return $this->getProvidedDependency(ProductCountDependencyProvider::FACADE_PRODUCT);
    }
}
