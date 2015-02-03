<?php

namespace AppBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Definition;

class HelperPass implements CompilerPassInterface
{
    protected $container;

    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('app.bundle.helper.helper_bag')) {
            return;
        }

        $this->container = $container;

        $helperTemplate = $container->getDefinition('app.bundle.helper.helper_bag');

        $this->addControllerHelpers($helperTemplate)
             ->addViewHelpers($helperTemplate)
        ;

        $container->removeDefinition('app.bundle.helper.helper_bag');
    }

    protected function addControllerHelpers($helperTemplate)
    {
        $helperBag     = clone $helperTemplate;
        $taggedHelpers = $this->container->findTaggedServiceIds('helper.controller');

        $this->addHelpers($helperBag, $taggedHelpers);

        $helperBag->setPublic(true);

        $this->container->setDefinition('app.bundle.helper.controller.helper_bag', $helperBag);

        return $this;
    }

    protected function addViewHelpers($helperTemplate)
    {
        $helperBag     = clone $helperTemplate;
        $taggedHelpers = $this->container->findTaggedServiceIds('helper.view');

        $this->addHelpers($helperBag, $taggedHelpers);

        $helperBag->setPublic(true);

        $this->container->setDefinition('app.bundle.helper.view.helper_bag', $helperBag);

        $twigExtension = $this->container->getDefinition('app.bundle.twig.extension.helpers');
        $twigExtension->addArgument($helperBag);

        return $this;
    }

    private function addHelpers($helperBag, $taggedHelpers)
    {
        foreach ($taggedHelpers as $id => $tags) {
            foreach ($tags as $attributes) {
                $alias = isset($attributes['alias']) ? $attributes['alias'] : null;
                $helperBag->addMethodCall('addHelper', [
                    new Reference($id), $alias
                ]);
            }
        }

        return $this;
    }
}
