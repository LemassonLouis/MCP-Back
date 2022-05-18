<?php

// LEMASON Louis

namespace App\Controller;

use App\Entity\Image;
use App\Entity\User;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use ApiPlatform\Core\Api\IriConverterInterface;

#[AsController]
final class ImageController extends AbstractController
{
    public function __invoke(Request $request, IriConverterInterface $iriConverter): Image
    {
        // $userRepo = new UserRepository();

        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $data = $request->request->all();
        $user = $iriConverter->getItemFromIri($data['iMGCreatedBy']);

        $image = new Image();
        $image->setFile($uploadedFile)
            ->setFileName("")
            ->setIMGUri("")
            ->setIMGCreatedBy($user)
            ->setIMGCreatedAt(new DateTimeImmutable());

        return $image;
    }
}
