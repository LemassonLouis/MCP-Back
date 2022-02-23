<?php

namespace App\Tests\Unit;

use App\Entity\Recipe;
use DateTime;
use PHPUnit\Framework\TestCase;

class RecipeTest extends TestCase
{
    private Recipe $recipe;

    protected function setUp(): void
    {
        parent::setUp();

        $this->recipe = new Recipe();
    }

    public function testGetRECName(): void
    {
        $value = 'Soupe miso';

        $response = $this->recipe->setName($value);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($value, $this->recipe->getName());
    }

    public function testGetRECComment(): void
    {
        $value = 'Ceci est un commentaire';

        $response = $this->recipe->setComment($value);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($value, $this->recipe->getComment());
    }

    public function testGetRECDuration(): void
    {
        $value = new DateTime();

        $response = $this->recipe->setDuration($value);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($value, $this->recipe->getDuration());
    }

    public function testGetRECPortion(): void
    {
        $value = 4;

        $response = $this->recipe->setPortion($value);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($value, $this->recipe->getPortion());
    }

    public function testGetRECInternal(): void
    {
        $value = true;

        $response = $this->recipe->setInternal($value);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($value, $this->recipe->getInternal());
    }

    public function testGetRECMoment(): void
    {
        $value = true;

        $response = $this->recipe->setMoment($value);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($value, $this->recipe->getMoment());
    }

    public function testGetRECSellPrice(): void
    {
        $value = 2300;

        $response = $this->recipe->setSellPrice($value);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($value, $this->recipe->getSellPrice());
    }

    public function testGetRECUsable(): void
    {
        $value = true;

        $response = $this->recipe->setUsable($value);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($value, $this->recipe->getUsable());
    }

    public function testGetRECIsTechnic(): void
    {
        $value = true;

        $response = $this->recipe->setIsTechnic($value);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($value, $this->recipe->getIsTechnic());
    }

    public function testGetRECIsArchive(): void
    {
        $value = true;

        $response = $this->recipe->setIsArchive($value);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($value, $this->recipe->getIsArchive());
    }

    public function testGetRECDateEdit(): void
    {
        $value = new DateTime();

        $response = $this->recipe->setDateEdit($value);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($value, $this->recipe->getDateEdit());
    }
}
