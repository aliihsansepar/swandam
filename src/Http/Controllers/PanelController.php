<?php

namespace Swandam\Core\Http\Controllers;

use Swandam\Core\Http\Controllers\Controller as BaseController;
use Swandam\Core\Models\Language;

class PanelController extends BaseController
{
    public function setLanguage(string $lang_code)
    {
        $language = Language::where('code', $lang_code)->first();
        if($language) {
            session(['panel.language' => $language]);
        }
    }
}