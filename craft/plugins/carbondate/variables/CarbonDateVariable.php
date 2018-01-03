<?php
/**
 * Carbon Date plugin for Craft CMS
 *
 * Carbon Date Variable
 *
 * --snip--
 * Craft allows plugins to provide their own template variables, accessible from the {{ craft }} global variable
 * (e.g. {{ craft.pluginName }}).
 *
 * https://craftcms.com/docs/plugins/variables
 * --snip--
 *
 * @author    Joshua Baker
 * @copyright Copyright (c) 2017 Joshua Baker
 * @link      https://joshuabaker.com/
 * @package   CarbonDate
 * @since     0.1.0
 */

namespace Craft;

class CarbonDateVariable
{
    public function getDate($date = null)
    {
        return craft()->carbonDate->getDate($date);
    }
}
