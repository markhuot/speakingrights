<?php
/**
 * Carbon Date plugin for Craft CMS
 *
 * CarbonDate Service
 *
 * --snip--
 * All of your plugin’s business logic should go in services, including saving data, retrieving data, etc. They
 * provide APIs that your controllers, template variables, and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 * --snip--
 *
 * @author    Joshua Baker
 * @copyright Copyright (c) 2017 Joshua Baker
 * @link      https://joshuabaker.com/
 * @package   CarbonDate
 * @since     0.1.0
 */

namespace Craft;

use \DateTime as SystemDateTime;
use Carbon\Carbon;

class CarbonDateService extends BaseApplicationComponent
{
    public function getDate($date = null)
    {
        if (empty($date)) {
            $date = 'now';
        }

        if ($date instanceof SystemDateTime) {
            return Carbon::instance($date);
        }

        $timezone = craft()->getTimeZone();

        return Carbon::parse($date, $timezone);
    }
}
