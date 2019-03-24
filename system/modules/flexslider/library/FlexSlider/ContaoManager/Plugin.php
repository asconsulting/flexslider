<?php

/**
 * Flex Slider for Contao 4+
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package	   asconsulting/flexslider
 * @link	   https://andrewstevens.consulting
 */
 
 

namespace FlexSlider\ContaoManager;

use Contao\ManagerPlugin\Config\ConfigPluginInterface;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;


class Plugin implements ConfigPluginInterface
{
    public function registerContainerConfiguration(LoaderInterface $loader, array $managerConfig)
    {
        $loader->load(function (ContainerBuilder $container) {
            $container->setDefinition(
                'flexslider.listener.console',
                (new Definition('FlexSlider\EventListener\SymlinkCommandListener'))
                    ->setArguments(['%kernel.root_dir%'])
                    ->addTag('kernel.event_listener', ['event' => 'console.terminate'])
            );
        });
    }
}
