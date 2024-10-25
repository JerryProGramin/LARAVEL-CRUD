<?php

declare(strict_types=1);

namespace App\Services\Image;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{
    public function saveBase64Image(string $base64Image, string $folder): string
    {
        $mimeType = explode(';', explode(':', $base64Image)[1])[0];
        $extension = match ($mimeType) {
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp',
            'image/bmp' => 'bmp',
            default => throw new Exception("Formato de imagen no soportado: $mimeType"),
        };

        $image = base64_decode(explode(',', $base64Image)[1]);
        $filename = Str::uuid() . '.' . $extension;
        $path = $folder . '/' . $filename;
        Storage::disk('public')->put($path, $image);
        return $path;
    }
}

