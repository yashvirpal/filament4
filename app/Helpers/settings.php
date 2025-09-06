<?php

use App\Models\Setting;

if (! function_exists('appSettings')) {
    function appSettings(): ?Setting
    {
        return cache()->rememberForever('app_settings', function () {
            return Setting::first();
        });
    }
}
