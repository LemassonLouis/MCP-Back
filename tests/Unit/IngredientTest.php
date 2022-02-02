<?php

namespace App\Tests\Unit;

use DateTime;
use App\Entity\Season;
use App\Entity\Ingredient;
use PHPUnit\Framework\TestCase;

class IngredientTest extends TestCase
{
    private Ingredient $ingredient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->ingredient = new Ingredient();
    }

    public function testGetINGName(): void
    {
        $value = 'Patate';

        $response = $this->ingredient->setINGName($value);

        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getINGName());
    }

    public function testGetINGAllergen(): void
    {
        $value = true;

        $response = $this->ingredient->setINGAllergen($value);

        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getINGAllergen());
    }

    public function testGetINGVege(): void
    {
        $value = false;

        $response = $this->ingredient->setINGVege($value);

        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getINGVege());
    }

    public function testGetINGUnit(): void
    {
        $value = 'kg';

        $response = $this->ingredient->setINGUnit($value);

        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getINGUnit());
    }

    public function testGetINGPrice(): void
    {
        $value = 3;

        $response = $this->ingredient->setINGPrice($value);

        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getINGPrice());
    }

    public function testGetINGIsArchive(): void
    {
        $value = false;

        $response = $this->ingredient->setINGIsArchive($value);

        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getINGIsArchive());
    }

    public function testGetINGDateEdit(): void
    {
        $value = new DateTime();

        $response = $this->ingredient->setINGDateEdit($value);

        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getINGDateEdit());
    }

    public function testGetSeasons(): void
    {
        $value = new Season();

        $response = $this->ingredient->addSeason($value);

        self::assertInstanceOf(Ingredient::class, $response);
        self::assertCount(1, $this->ingredient->getSeasons());
        self::assertTrue($this->ingredient->getSeasons()->contains($value));

        $response = $this->ingredient->removeSeason($value);

        self::assertInstanceOf(Ingredient::class, $response);
        self::assertCount(0, $this->ingredient->getSeasons());
        self::assertFalse($this->ingredient->getSeasons()->contains($value));
    }
}
