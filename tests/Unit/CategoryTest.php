<?php

namespace App\Tests\Unit;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    private Category $Category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->Category = new Category();
    }

    public function testGetName(): void
    {
        $value = 'Dessert';

        $response = $this->Category->setName($value);

        self::assertInstanceOf(Category::class, $response);
        self::assertEquals($value, $this->Category->getName());
    }

    public function testGetIsArchive(): void
    {
        $value = false;

        $response = $this->Category->setIsArchive($value);

        self::assertInstanceOf(Category::class, $response);
        self::assertEquals($value, $this->Category->getIsArchive());
    }    
}
