<?php

namespace Craft;

class LocaleFieldTwigExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        $twig = craft()->templates->getTwig();

        return [
            'localeField' => new \Twig_Function_Function(function ($entry, $enFieldName) use ($twig) {
                $frFieldName = "{$enFieldName}Fr";
                $locale = craft()->cookies_utils->get('langcode');

                if ($locale == 'fr' && in_array($enFieldName, ['excerpt', 'introduction', 'description', 'bio', 'title']) && !empty($entry->{$frFieldName})) {
                    return $entry->{$frFieldName};
                }

                if ($locale == 'fr' && $enFieldName == 'body' && $entry->{$frFieldName}->count() > 0) {
                    return $entry->{$frFieldName};
                }

                return $entry->{$enFieldName};
            }),
            'locale' => new \Twig_Function_Function(function () {
                return craft()->cookies_utils->get('langcode') ?: 'en';
            }),
        ];
    }

    public function getFilters() {
        $locale = craft()->cookies_utils->get('langcode');

        return [
            't' => new \Twig_Filter_Function(function ($text, $opts=[]) use ($locale) {
                return Craft::t($text, $opts, null, $locale);
            }),
        ];
    }
}