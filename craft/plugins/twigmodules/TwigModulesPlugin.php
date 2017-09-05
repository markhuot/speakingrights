<?php

namespace Craft;

class TwigModulesPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Twig Modules');
    }

    function getVersion()
    {
        return '1.0.0';
    }

    function getDeveloper()
    {
        return 'Mark Huot';
    }

    function getDeveloperUrl()
    {
        return 'https://github.com/markhuot';
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.twigmodules.twig.TwigModulesTwigExtension');
        // var_dump(class_exists(TwigModulesTwigExtension::class));
        // die;
        return new TwigModulesTwigExtension();
    }
}