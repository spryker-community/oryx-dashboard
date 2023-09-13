<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\MostSellingProducts\Communication\Plugin;

use Generated\Shared\Transfer\ApiRequestTransfer;
use Generated\Shared\Transfer\ApiValidationErrorTransfer;
use Spryker\Zed\ApiExtension\Dependency\Plugin\ApiValidatorPluginInterface;

class MostSellingProductsApiValidatorPlugin implements ApiValidatorPluginInterface
{
    public function getResourceName(): string
    {
        return MostSellingProductsApiResourcePlugin::MOST_SELLING_PRODUCTS_RESOURCE_NAME;
    }

    public function validate(ApiRequestTransfer $apiRequestTransfer): array
    {
        $apiValidationErrorCollection = [];
        $criteria = json_decode($apiRequestTransfer->getFilter()->getCriteriaJson(), true);

        if (empty($criteria['startDate'])) {
            $apiValidationError = new ApiValidationErrorTransfer();
            $apiValidationError
                ->setField('filter.startDate')
                ->setMessages(['Missing start date']);

            $apiValidationErrorCollection[] = $apiValidationError;
        }

        if (empty($criteria['endDate'])) {
            $apiValidationError = new ApiValidationErrorTransfer();
            $apiValidationError
                ->setField('filter.endDate')
                ->setMessages(['Missing end date']);

            $apiValidationErrorCollection[] = $apiValidationError;
        }

        if ($apiRequestTransfer->getFilter()->getLimit() === null) {
            $apiValidationError = new ApiValidationErrorTransfer();
            $apiValidationError
                ->setField('limit')
                ->setMessages(['Missing limit']);

            $apiValidationErrorCollection[] = $apiValidationError;
        }

        return $apiValidationErrorCollection;
    }
}
