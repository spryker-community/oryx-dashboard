<?php

namespace Pyz\Zed\Api;

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
}
