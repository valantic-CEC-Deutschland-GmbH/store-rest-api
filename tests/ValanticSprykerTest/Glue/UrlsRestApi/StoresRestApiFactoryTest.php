<?php

declare(strict_types = 1);

namespace ValanticSprykerTest\Glue\UrlsRestApi;

use Codeception\Test\Unit;
use PHPUnit\Framework\MockObject\MockObject;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\Kernel\Container;
use Spryker\Glue\StoresRestApi\Dependency\Client\StoresRestApiToStoreClientInterface;
use ValanticSpryker\Glue\StoresRestApi\Processor\Mapper\StoresResourceMapper;
use ValanticSpryker\Glue\StoresRestApi\StoresRestApiDependencyProvider;
use Spryker\Glue\StoresRestApi\StoresRestApiDependencyProvider as SprykerStoresRestApiDependencyProvider;
use ValanticSpryker\Glue\StoresRestApi\StoresRestApiFactory;

/**
 * Auto-generated group annotations
 *
 * @group ValanticSprykerTest
 * @group Glue
 * @group UrlsRestApi
 * Add your own group annotations below this line
 */
class StoresRestApiFactoryTest extends Unit
{
  /**
   * @var \ValanticSpryker\Glue\StoresRestApi\StoresRestApiFactory
   */
    protected $businessFactory;

  /**
   * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
   */
    private Container $containerMock;


  /**
   * @var \PHPUnit\Framework\MockObject\MockObject|(\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface&\PHPUnit\Framework\MockObject\MockObject)
   */
    private RestResourceBuilderInterface|MockObject $restResourceBuilderMock;

  /**
   * @return void
   */
    protected function _before(): void
    {
        parent::_before();
    }

  /**
   * @return void
   */
    public function testCreateUrlResolver(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
        ->disableOriginalConstructor()
        ->getMock();

        $this->storesRestApiToStoreClient = $this->getMockBuilder(StoresRestApiToStoreClientInterface::class)
        ->disableOriginalConstructor()
        ->getMock();

        $this->containerMock->expects(static::atLeastOnce())
        ->method('has')
        ->willReturn(true);

        $this->containerMock->expects(static::atLeastOnce())
        ->method('get')
        ->withConsecutive(
            [SprykerStoresRestApiDependencyProvider::CLIENT_STORE],
            [StoresRestApiDependencyProvider::STORE_RESOURCE_MAPPER_PLUGINS],
        )
        ->willReturnOnConsecutiveCalls(
            $this->storesRestApiToStoreClient,
            [],
        );

        $this->restResourceBuilderMock = $this->getMockBuilder(RestResourceBuilderInterface::class)
        ->disableOriginalConstructor()
        ->getMock();

        $this->businessFactory = new class ($this->restResourceBuilderMock) extends StoresRestApiFactory {
          /**
           * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
           */
            protected RestResourceBuilderInterface $restResourceBuilder;

          /**
           * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
           */
            public function __construct(RestResourceBuilderInterface $restResourceBuilder)
            {
                $this->restResourceBuilder = $restResourceBuilder;
            }

          /**
           * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
           */
            public function getResourceBuilder(): RestResourceBuilderInterface
            {
                return $this->restResourceBuilder;
            }
        };

        $this->businessFactory->setContainer($this->containerMock);

        $this->assertInstanceOf(StoresResourceMapper::class, $this->businessFactory->createStoresResourceMapper());
    }
}
