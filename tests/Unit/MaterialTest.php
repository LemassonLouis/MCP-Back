<?php

namespace App\Tests\Unit;

use App\Entity\Material;
use PHPUnit\Framework\TestCase;

class MaterialTest extends TestCase
{
    private Material $material;

    protected function setUp(): void
    {
        parent::setUp();

        $this->material = new Material();
    }

    public function testGetName(): void
    {
        $value = 'Four';

        $response = $this->material->setMATName($value);

        self::assertInstanceOf(Material::class, $response);
        self::assertEquals($value, $this->material->getMATName());
    }

    public function testIsArchive(): void
    {
        $value = true;

        $response = $this->material->setMATIsArchive($value);

        self::assertInstanceOf(Material::class, $response);
        self::assertEquals($value, $this->material->getMATIsArchive());
    }
}
