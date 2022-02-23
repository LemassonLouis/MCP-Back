<?php

namespace App\Tests\Unit;

use App\Entity\Step;
use DateTime;
use PHPUnit\Framework\TestCase;

class StepTest extends TestCase
{
    private Step $step;

    protected function setUp(): void
    {
        parent::setUp();

        $this->step = new Step();
    }

    public function testGetSTEOrder(): void
    {
        $value = 1;

        $response = $this->step->setSTEOrder($value);

        self::assertInstanceOf(Step::class, $response);
        self::assertEquals($value, $this->step->getSTEOrder());
    }

    public function testGetSTEDescription(): void
    {
        $value = 'Ceci est une description';

        $response = $this->step->setSTEDescription($value);

        self::assertInstanceOf(Step::class, $response);
        self::assertEquals($value, $this->step->getSTEDescription());
    }

    public function testGetSEADateEdit(): void
    {
        $value = new DateTime();

        $response = $this->step->setSTEDateEdit($value);

        self::assertInstanceOf(Step::class, $response);
        self::assertEquals($value, $this->step->getSTEDateEdit());
    }
}
