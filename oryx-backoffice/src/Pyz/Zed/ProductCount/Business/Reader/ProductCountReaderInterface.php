<?php

declare(strict_types=1);

namespace Pyz\Zed\ProductCount\Business\Reader;

interface ProductCountReaderInterface
{
    /**
     * @return int
     */
    public function getActiveProductCount(): int;

    /**
     * @return int
     */
    public function getInactiveProductCount(): int;
}
