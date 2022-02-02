<?php

namespace App\Tests\Unit;

use App\Entity\Ingredient;
use App\Entity\Season;
use DateTime;
use PHPUnit\Framework\TestCase;

class SeasonTest extends TestCase
{
    private Season $season;

    protected function setUp(): void
    {
        parent::setUp();

        $this->season = new Season();
    }

    public function testGetSEAName(): void
    {
        $value = 'Noël';

        $response = $this->season->setSEAName($value);

        self::assertInstanceOf(Season::class, $response);
        self::assertEquals($value, $this->season->getSEAName());
    }

    public function testGetSEADateStart(): void
    {
        $value = new DateTime();

        $response = $this->season->setSEADateStart($value);

        self::assertInstanceOf(Season::class, $response);
        self::assertEquals($value, $this->season->getSEADateStart());
    }

    public function testGetSEADateEnd(): void
    {
        $value = new DateTime();

        $response = $this->season->setSEADateEnd($value);

        self::assertInstanceOf(Season::class, $response);
        self::assertEquals($value, $this->season->getSEADateEnd());
    }

    public function testGetSEAIsArchive(): void
    {
        $value = false;

        $response = $this->season->setSEAIsArchive($value);

        self::assertInstanceOf(Season::class, $response);
        self::assertEquals($value, $this->season->getSEAIsArchive());
    }

    public function testGetSEADateEdit(): void
    {
        $value = new DateTime();

        $response = $this->season->setSEADateEdit($value);

        self::assertInstanceOf(Season::class, $response);
        self::assertEquals($value, $this->season->getSEADateEdit());
    }
}
