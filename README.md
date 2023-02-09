# your package

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg)](https://php.net/)

 - Allows/Adds mapper extension [[plugins](Glue/StoresRestApi/Plugin/StoreResourceMapperPluginInterface.php)]  to /stores endpoint

Example Plugin:
```php
<?php

declare(strict_types = 1);

namespace Pyz\Glue\StoresRestApi\Plugin;

use Generated\Shared\Transfer\StoresRestAttributesTransfer;
use Spryker\Glue\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Glue\StoresRestApi\StoresRestApiFactory getFactory()
 */
class StoreResourceGenderMapperPlugin extends AbstractPlugin implements StoreResourceMapperPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\StoresRestAttributesTransfer $storeRestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\StoresRestAttributesTransfer
     */
    public function map(StoresRestAttributesTransfer $storeRestAttributesTransfer): StoresRestAttributesTransfer
    {
        $storeClient = $this->getFactory()->getStoreClient();
        $storeRestAttributesTransfer->setGenders($storeClient->getCurrentStore()->getAvailableGenders());

        return $storeRestAttributesTransfer;
    }
}
```
## Integration

### Add composer registry
```
composer config repositories.gitlab.nxs360.com/461 '{"type": "composer", "url": "https://gitlab.nxs360.com/api/v4/group/461/-/packages/composer/packages.json"}'
```

### Add Gitlab domain
```
composer config gitlab-domains gitlab.nxs360.com
```

### Authentication
Go to Gitlab and create a personal access token. Then create an **auth.json** file:
```
composer config gitlab-token.gitlab.nxs360.com <personal_access_token>
```

Make sure to add **auth.json** to your **.gitignore**.

### Install package
```
composer req valantic-spryker/elasticsearch-logging
```

### Update your shared config
```php
$config[KernelConstants::PROJECT_NAMESPACES] = [
    'ValanticSpryker',
    ...
];

$config[LogConstants::LOG_LEVEL] = Logger::DEBUG;
```

Reference implementation: https://gitlab.nxs360.com/team-lr/glue-api
