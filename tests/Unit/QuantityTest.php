<?php

namespace App\Tests\Unit;

use App\Entity\Quantity;
use PHPUnit\Framework\TestCase;

class QuantityTest extends TestCase
{
    private Quantity $Quantity;

    protected function setUp(): void
    {
        parent::setUp();

        $this->Quantity = new Quantity();
    }

    public function testGetQuantity(): void
    {
        $value = 3;

        $response = $this->Quantity->setQuantity($value);

        self::assertInstanceOf(Quantity::class, $response);
        self::assertEquals($value, $this->Quantity->getQuantity());
    }  

}
