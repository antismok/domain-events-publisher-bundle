<?php

declare(strict_types=1);

namespace Antismok\DomainEventPublisherBundle;

use Antismok\DomainEventPublisherBundle\DependencyInjection\Compiler\DomainListenersPass;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Roman Saritskiy <saritskiy.r.mon@gmail.com>
 */
class DomainEventPublisherBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/Resources/config'));
        $loader->load('services.yml');
        parent::build($container);

        $container->addCompilerPass(new DomainListenersPass());
    }
}
