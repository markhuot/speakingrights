<?php
/**
 * Carbon Date plugin for Craft CMS
 *
 * Carbon Date Twig Extension
 *
 * --snip--
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators, global variables, and
 * functions. You can even extend the parser itself with node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 * --snip--
 *
 * @author    Joshua Baker
 * @copyright Copyright (c) 2017 Joshua Baker
 * @link      https://joshuabaker.com/
 * @package   CarbonDate
 * @since     0.1.0
 */

namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;
use Twig_Function_Method;

class CarbonDateTwigExtension extends Twig_Extension
{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'CarbonDate';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | someFilter }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            'carbon' => new Twig_Filter_Method($this, 'getCarbonDate'),
        ];
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            'carbon' => new Twig_Function_Method($this, 'getCarbonDate'),
        ];
    }

    /**
     * Our function called via Twig; it can do anything you want
     *
      * @return string
     */
    public function getCarbonDate($date = null)
    {
        return craft()->carbonDate->getDate($date);
    }
}
