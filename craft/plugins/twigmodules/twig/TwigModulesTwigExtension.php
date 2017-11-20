<?php

namespace Craft;

class TwigModulesTwigExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        $twig = craft()->templates->getTwig();

        return [
            'styles' => new \Twig_Function_Function(function ($path) use ($twig) {
                $source = $twig->getLoader()->getSource($path);
                return json_decode($source, true);
            }),
            'uniqueBy' => new \Twig_Function_Function(function ($collection, $key, $sort='') use ($twig) {
                $new = [];

                foreach ($collection as $item) {
                    $new[$item[$key]] = $item;
                }

                $new = array_values($new);

                if ($sort) {
                    usort($new, function ($a, $b) use ($sort) {
                        return strcmp($a[$sort], $b[$sort]);
                    });
                }

                return $new;
            }),
        ];
    }
}