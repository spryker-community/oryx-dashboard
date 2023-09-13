<?php declare(strict_types=1);

namespace Pyz\Zed\ProductCount\Business;

interface ProductCountFacadeInterface
{
    public function getActiveProductCount(): int;

    public function getInactiveProductCount(): int;
}
