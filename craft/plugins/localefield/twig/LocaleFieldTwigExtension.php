<?php

namespace Craft;

class LocaleFieldTwigExtension extends \Twig_Extension
{
    private function langcode() {
        if ($langcode = craft()->cookies_utils->get('langcode')) {
            return $langcode;
        }

        if (preg_match('/parlonsdroits\.ca$/', craft()->request->getHostName())) {
            return 'fr';
        }

        return 'en';
    }

    public function getFunctions()
    {
        $twig = craft()->templates->getTwig();

        return [
            'localeField' => new \Twig_Function_Function(function ($entry, $enFieldName) use ($twig) {
                $frFieldName = "{$enFieldName}Fr";
                $langcode = $this->langcode();

                if ($langcode == 'fr' && in_array($enFieldName, ['excerpt', 'introduction', 'description', 'bio', 'title']) && !empty($entry->{$frFieldName})) {
                    return $entry->{$frFieldName};
                }

                if ($langcode == 'fr' && in_array($enFieldName, ['body', 'hero', 'bodyText']) && $entry->{$frFieldName}->count() > 0) {
                    return $entry->{$frFieldName};
                }

                return $entry->{$enFieldName};
            }),
            'locale' => new \Twig_Function_Function(function () {
                return $this->langcode();
            }),
        ];
    }

    public function getFilters() {
        $langcode = $this->langcode();

        return [
            't' => new \Twig_Filter_Function(function ($text, $opts=[]) use ($langcode) {
                return Craft::t($text, $opts, null, $langcode);
            }),
        ];
    }
}