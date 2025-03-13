<?php

use Stichoza\GoogleTranslate\GoogleTranslate;

if (!function_exists('translateContent')) {
    function translateContent($content, $to = 'en', $from = 'ne')
    {
        try {
            $translator = new GoogleTranslate($to);
            $translator->setSource($from);
            return $translator->translate($content);
        } catch (\Exception $e) {
            return $content; // Return original content if translation fails
        }
    }
}
