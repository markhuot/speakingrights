<?php

namespace Craft;

class LocaleFieldPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Locale Field');
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
        Craft::import('plugins.localefield.twig.LocaleFieldTwigExtension');
        return new LocaleFieldTwigExtension();
    }
}