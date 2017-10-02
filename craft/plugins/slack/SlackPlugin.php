<?php

namespace Craft;

class SlackPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Slack');
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
}