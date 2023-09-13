<?php

namespace Pyz\Zed\MostSellingProducts\Business\Reader;

use Generated\Shared\Transfer\MostSellingProductsFilterTransfer;
use Pyz\Zed\MostSellingProducts\Persistence\MostSellingProductsRepositoryInterface;

class MostSellingProductsReader implements MostSellingProductsReaderInterface
{
    /**
     * @var MostSellingProductsRepositoryInterface
     */
    private MostSellingProductsRepositoryInterface $repository;

    /**
     * @param MostSellingProductsRepositoryInterface $repository
     */
    public function __construct(MostSellingProductsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer
     * @return array
     */
    public function getMostSellingProductsByDateRange(MostSellingProductsFilterTransfer $mostSellingProductsFilterTransfer): array
    {
        return $this->repository->findMostSellingProductsByDateRange($mostSellingProductsFilterTransfer);
    }
}
