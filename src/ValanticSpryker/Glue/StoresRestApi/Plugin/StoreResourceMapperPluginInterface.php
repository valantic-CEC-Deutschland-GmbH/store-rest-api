<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\StoresRestApi\Plugin;

use Generated\Shared\Transfer\StoresRestAttributesTransfer;

interface StoreResourceMapperPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\StoresRestAttributesTransfer $storeRestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\StoresRestAttributesTransfer
     */
    public function map(StoresRestAttributesTransfer $storeRestAttributesTransfer): StoresRestAttributesTransfer;
}
