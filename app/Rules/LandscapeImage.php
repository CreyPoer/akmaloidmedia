<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class LandscapeImage implements Rule
{
    public function passes($attribute, $value)
    {
        if ($value instanceof UploadedFile && $value->isValid()) {
            $imageSize = getimagesize($value);
            return $imageSize[0] > $imageSize[1]; // width > height
        }

        return false;
    }

    public function message()
    {
        return ':attribute harus berukuran landscape.';
    }
}
