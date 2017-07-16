<?php

namespace App\Models\Media;

use Spatie\MediaLibrary\Media as BaseMedia;

class Media extends BaseMedia
{
    public function getUrl(string $conversionName = '') :string
    {
        return config('app.admin-app.url') . parent::getUrl($conversionName);
    }
}
