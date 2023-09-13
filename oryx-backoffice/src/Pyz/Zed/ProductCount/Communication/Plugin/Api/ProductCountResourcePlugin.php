<?php declare(strict_types=1);

namespace Pyz\Zed\ProductCount\Communication\Plugin\Api;

use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;
use Spryker\Zed\Api\Dependency\Plugin\ApiResourcePluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Pyz\Zed\ProductCount\Business\ProductCountFacade getFacade()
 */
class ProductCountResourcePlugin extends AbstractPlugin implements ApiResourcePluginInterface
{
    private const RESOURCE_NAME = 'product_count';

    /**
     * @inheritDoc
     */
    public function getResourceName()
    {
        return self::RESOURCE_NAME;
    }

    /**
     * @inheritDoc
     */
    public function add(ApiDataTransfer $apiDataTransfer)
    {
        throw new \Exception('Not implemented');
    }

    /**
     * @inheritDoc
     */
    public function get($id)
    {
        throw new \Exception('Not implemented');
    }

    /**
     * @inheritDoc
     */
    public function update($id, ApiDataTransfer $apiDataTransfer)
    {
        throw new \Exception('Not implemented');
    }

    /**
     * @inheritDoc
     */
    public function remove($id)
    {
        throw new \Exception('Not implemented');
    }

    /**
     * @inheritDoc
     */
    public function find(ApiRequestTransfer $apiRequestTransfer)
    {
        $result = new ApiCollectionTransfer();
        $result->setData(
            [
                [
                    'name' => 'Active',
                    'value' => $this->getFacade()->getActiveProductCount()
                ],
                [
                    'name' => 'Inactive',
                    'value' => $this->getFacade()->getInactiveProductCount()
                ],
            ]
        );

        return $result;
    }
}
