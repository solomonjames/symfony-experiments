<?php

namespace AppBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ControllerHelperPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('app.bundle.controller.helper_bag')) {
            return;
        }

        $helper = $container->getDefinition('app.bundle.controller.helper_bag');

        $taggedHelpers = $container->findTaggedServiceIds('controller.helper');

        foreach ($taggedHelpers as $id => $tags) {
            foreach ($tags as $attributes) {
                $helper->addMethodCall('addHelper', array(
                    new Reference($id), $attributes['alias']
                ));
            }
        }
    }
}
