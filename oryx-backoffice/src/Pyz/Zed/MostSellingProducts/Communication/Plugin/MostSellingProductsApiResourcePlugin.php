<?php

namespace Pyz\Zed\MostSellingProducts\Communication\Plugin;

use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;
use Generated\Shared\Transfer\ApiValidationErrorTransfer;
use Generated\Shared\Transfer\MostSellingProductsFilterTransfer;
use Spryker\Zed\Api\Dependency\Plugin\ApiResourcePluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method \Pyz\Zed\MostSellingProducts\Business\MostSellingProductsFacadeInterface getFacade()
 */
class MostSellingProductsApiResourcePlugin extends AbstractPlugin implements ApiResourcePluginInterface
{
    public const MOST_SELLING_PRODUCTS_RESOURCE_NAME = 'most-selling-products';

    public function getResourceName()
    {
        return self::MOST_SELLING_PRODUCTS_RESOURCE_NAME;
    }

    public function add(ApiDataTransfer $apiDataTransfer)
    {
        // TODO: Implement add() method.
    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function update($id, ApiDataTransfer $apiDataTransfer)
    {
        // TODO: Implement update() method.
    }

    public function remove($id)
    {
        // TODO: Implement remove() method.
    }

    public function find(ApiRequestTransfer $apiRequestTransfer)
    {
        $validateResponse = $this->validate($apiRequestTransfer);

        if ($validateResponse->count() > 0) {
            $apiCollectionTransfer = new ApiCollectionTransfer();
            $apiCollectionTransfer->setValidationErrors($validateResponse);

            return $apiCollectionTransfer;
        }

        $mostSellingProductsFilter = new MostSellingProductsFilterTransfer();
        $mostSellingProductsFilter->fromArray(json_decode($apiRequestTransfer->getFilter()->getCriteriaJson(), true), true);
        $mostSellingProductsFilter->setLimit($apiRequestTransfer->getFilter()->getLimit());

        $mostSellingProducts = $this->getFacade()->getMostSellingProductsByDate($mostSellingProductsFilter);

        $apiCollectionTransfer = new ApiCollectionTransfer();
        $apiCollectionTransfer->setData($mostSellingProducts);

        return $apiCollectionTransfer;
    }

    private function validate(ApiRequestTransfer $apiRequestTransfer): \ArrayObject
    {
        $apiValidationErrorCollection = new \ArrayObject();
        $criteria = json_decode($apiRequestTransfer->getFilter()->getCriteriaJson(), true);

        if (empty($criteria['startDate'])) {
            $apiValidationError = new ApiValidationErrorTransfer();
            $apiValidationError
                ->setField('filter.startDate')
                ->setMessages(['Missing start date']);

            $apiValidationErrorCollection->append($apiValidationError);
        }

        if (empty($criteria['endDate'])) {
            $apiValidationError = new ApiValidationErrorTransfer();
            $apiValidationError
                ->setField('filter.endDate')
                ->setMessages(['Missing end date']);

            $apiValidationErrorCollection->append($apiValidationError);
        }

        if ($apiRequestTransfer->getFilter()->getLimit() === null) {
            $apiValidationError = new ApiValidationErrorTransfer();
            $apiValidationError
                ->setField('limit')
                ->setMessages(['Missing limit']);

            $apiValidationErrorCollection->append($apiValidationError);
        }

        return $apiValidationErrorCollection;
    }
}
