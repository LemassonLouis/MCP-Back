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

        $response = $this->Supplier->setName($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getName());
    }

    public function testGetSUPAddress(): void
    {
        $value = "25 rue Dupont";

        $response = $this->Supplier->setAddress($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getAddress());
    }

    public function testGetSUPPostalCode(): void
    {
        $value = "14000";

        $response = $this->Supplier->setZip($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getZip());
    }

    public function testGetSUPCity(): void
    {
        $value = "Bordeaux";

        $response = $this->Supplier->setCity($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getCity());
    }

    public function testGetSUPPhone(): void
    {
        $value = "+33201020304";

        $response = $this->Supplier->setPhone($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getPhone());
    }

    public function testGetSUPMail(): void
    {
        $value = "test@test.com";

        $response = $this->Supplier->setMail($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getMail());
    }

    public function testGetSUPIsArchive(): void
    {
        $value = false;

        $response = $this->Supplier->setIsArchive($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getIsArchive());
    }

    public function testGetSUPDateEdit(): void
    {
        $value = new DateTime();

        $response = $this->Supplier->setDateEdit($value);

        self::assertInstanceOf(Supplier::class, $response);
        self::assertEquals($value, $this->Supplier->getDateEdit());
    }
}
