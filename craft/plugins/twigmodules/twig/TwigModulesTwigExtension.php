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
        ];
    }
}