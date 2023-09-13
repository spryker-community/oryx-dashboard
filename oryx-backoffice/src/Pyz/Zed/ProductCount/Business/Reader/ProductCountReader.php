<?php

declare(strict_types = 1);

namespace Pyz\Zed\ProductCount\Business\Reader;

use Generated\Shared\Transfer\ProductCountCollectionTransfer;
use Generated\Shared\Transfer\ProductCountCriteriaTransfer;
use Generated\Shared\Transfer\ProductCriteriaTransfer;
use Pyz\Zed\ProductCount\Persistence\ProductCountRepositoryInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

class ProductCountReader implements ProductCountReaderInterface
{
    private ProductFacadeInterface $productFacade;

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct(ProductFacadeInterface $productFacade)
    {
        $this->productFacade = $productFacade;
    }

    public function getActiveProductCount(): int
    {
        $filterCriteria = new ProductCriteriaTransfer();
        $filterCriteria->setIsActive(true);

        return count($this->productFacade->getProductConcretesByCriteria($filterCriteria));
    }

    public function getInactiveProductCount(): int
    {
        $filterCriteria = new ProductCriteriaTransfer();
        $filterCriteria->setIsActive(false);

        return count($this->productFacade->getProductConcretesByCriteria($filterCriteria));
    }
}
