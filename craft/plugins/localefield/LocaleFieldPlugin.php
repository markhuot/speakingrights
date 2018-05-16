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

    public function modifyCpNav(&$nav)
    {
        craft()->templates->includeCss(<<<EOT
        #global-sidebar { background: linear-gradient(90deg, #90278E, #5C23A1); }
        #page-header #page-title h1 { color: #90278E; }
EOT
);

//#ffdd15;
    }
}