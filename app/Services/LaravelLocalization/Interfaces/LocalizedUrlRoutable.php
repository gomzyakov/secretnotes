<?php

namespace App\Services\LaravelLocalization\Interfaces;

interface LocalizedUrlRoutable
{
    /**
     * Get the value of the model's localized route key.
     *
     * @param mixed $locale
     *
     * @return mixed
     */
    public function getLocalizedRouteKey($locale);
}
