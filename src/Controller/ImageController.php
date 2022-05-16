<?php

// LEMASON Louis

namespace App\Controller;

use App\Entity\Image;
use DateTimeImmutable;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request;

class ImageController
{

    public function __invoke(Image $image, Request $request)
    {
        $image = $request->attributes->get('data');
        if (!($image instanceof Image)) {
            throw new RuntimeException('Image attendu');
        }
        $image->setFile($request->files->get('file'));
        $image->setIMGCreatedAt(new DateTimeImmutable());
        return $image;
    }
}
