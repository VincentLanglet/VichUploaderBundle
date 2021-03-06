<?php

namespace Vich\UploaderBundle\Tests\Storage\Flysystem;

use League\Flysystem\FilesystemInterface;
use Psr\Container\ContainerInterface;

/**
 * @author Titouan Galopin <galopintitouan@gmail.com>
 */
final class PsrContainerFlysystemStorageTest extends AbstractFlysystemStorageTest
{
    protected function createRegistry(FilesystemInterface $filesystem): ContainerInterface
    {
        $locator = $this
            ->getMockBuilder(ContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $locator
            ->method('get')
            ->with(self::FS_KEY)
            ->willReturn($filesystem);

        return $locator;
    }
}
