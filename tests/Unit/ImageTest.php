<?php

namespace App\Tests\Unit;

use App\Entity\Image;
use DateTime;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    private Image $image;

    protected function setUp(): void
    {
        parent::setUp();

        $this->image = new Image();
    }

    public function testGetIMGName(): void
    {
        $value = 'Pomme';

        $response = $this->image->setIMGName($value);

        self::assertInstanceOf(Image::class, $response);
        self::assertEquals($value, $this->image->getIMGName());
    }

    public function testGetIMGUri(): void
    {
        $value = 'https://media.istockphoto.com/photos/red-apple-fruit-with-green-leaf-isolated-on-white-picture-id925389178?k=20&m=925389178&s=612x612&w=0&h=6TUJn0mknsO7gPO0j_OKMBhs1ng0LbBKq5OiN_fhVBQ=';

        $response = $this->image->setIMGUri($value);

        self::assertInstanceOf(Image::class, $response);
        self::assertEquals($value, $this->image->getIMGUri());
    }

    public function testGetIMGDateEdit(): void
    {
        $value = new DateTime();

        $response = $this->image->setIMGDateEdit($value);

        self::assertInstanceOf(Image::class, $response);
        self::assertEquals($value, $this->image->getIMGDateEdit());
    }
}
