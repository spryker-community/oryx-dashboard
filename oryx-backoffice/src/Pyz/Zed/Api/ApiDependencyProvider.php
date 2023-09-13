<?php

namespace Pyz\Zed\Api;

use Pyz\Zed\MostSellingProducts\Communication\Plugin\Api\MostSellingProductsApiResourcePlugin;
use Pyz\Zed\MostSellingProducts\Communication\Plugin\Api\MostSellingProductsApiValidatorPlugin;
use Pyz\Zed\ProductCount\Communication\Plugin\Api\ProductCountResourcePlugin;
use Spryker\Zed\Api\ApiDependencyProvider as SprykerApiDependencyProvider;
use Spryker\Zed\Api\Communication\Plugin\ApiRequestTransferFilterHeaderDataPlugin;
use Spryker\Zed\Api\Communication\Plugin\ApiRequestTransferFilterServerDataPlugin;

class ApiDependencyProvider extends SprykerApiDependencyProvider
{
    /**
     * @return array<\Spryker\Zed\Api\Communication\Plugin\ApiRequestTransferFilterPluginInterface>
     */
    protected function getApiRequestTransferFilterPluginCollection(): array
    {
        return [
            new ApiRequestTransferFilterServerDataPlugin(),
            new ApiRequestTransferFilterHeaderDataPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\Api\Dependency\Plugin\ApiResourcePluginInterface>
     */
    protected function getApiResourcePluginCollection()
    {
        return [
            new ProductCountResourcePlugin(),
            new MostSellingProductsApiResourcePlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\ApiExtension\Dependency\Plugin\ApiValidatorPluginInterface>
     */
    protected function getApiValidatorPluginCollection()
    {
        return [
            new MostSellingProductsApiValidatorPlugin(),
        ];
    }
}
