<?php

/**
 * @author Jérémie Fauveau
 * @create date 2022-05-15 22:04:07
 * @modify date 2022-05-15 22:04:07
 * @desc [description]
 */

namespace App\Tests\Unit;

use App\Entity\Supplier;
use DateTime;
use PHPUnit\Framework\TestCase;

class SupplierTest extends TestCase
{
    private Supplier $Supplier;

    protected function setUp(): void
    {
        parent::setUp();

        $this->Supplier = new Supplier();
    }

    public function testGetSUPName(): void
    {
        $value = 'Isetert Corporation';

        $response = $this->Supplier->setSUPName($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getSUPName());
    }

    public function testGetSUPAddress(): void
    {
        $value = "25 rue Dupont";

        $response = $this->Supplier->setSUPAddress($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getSUPAddress());
    }

    public function testGetSUPPostalCode(): void
    {
        $value = "14000";

        $response = $this->Supplier->setSUP_zipCode($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getSUP_zipCode());
    }

    public function testGetSUPCity(): void
    {
        $value = "Bordeaux";

        $response = $this->Supplier->setSUPCity($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getSUPCity());
    }

    public function testGetSUPPhone(): void
    {
        $value = "+33201020304";

        $response = $this->Supplier->setSUPPhone($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getSUPPhone());
    }

    public function testGetSUPMail(): void
    {
        $value = "test@test.com";

        $response = $this->Supplier->setSUPMail($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getSUPMail());
    }

    public function testGetSUPIsArchive(): void
    {
        $value = false;

        $response = $this->Supplier->setSUPIsArchive($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getSUPIsArchive());
    }

    public function testGetSUPDateEdit(): void
    {
        $value = new DateTime();

        $response = $this->Supplier->setSUPDateEdit($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getSUPDateEdit());
    }
}
