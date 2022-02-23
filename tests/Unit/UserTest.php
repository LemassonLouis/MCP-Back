<?php

namespace App\Tests\Unit;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = new User();
    }

    public function testGetEmail(): void
    {
        $value = 'test@test.fr';

        $response = $this->user->setEmail($value);

        self::assertInstanceOf(User::class, $response);
        self::assertEquals($value, $this->user->getEmail());
    }

    public function testGetFirtName(): void
    {
        $value = 'John';

        $response = $this->user->setFirstName($value);

        self::assertInstanceOf(User::class, $response);
        self::assertEquals($value, $this->user->getFirstName());
    }

    public function testGetLastName(): void
    {
        $value = 'Doe';

        $response = $this->user->setLastName($value);

        self::assertInstanceOf(User::class, $response);
        self::assertEquals($value, $this->user->getLastName());
    }

    public function testGetRoles(): void
    {
        $value = ['ROLE_USER'];

        $response = $this->user->setRoles($value);

        self::assertInstanceOf(User::class, $response);
        self::assertEquals($value, $this->user->getRoles());
    }

    public function testGetPassword(): void
    {
        $value = 'password';

        $response = $this->user->setPassword($value);

        self::assertInstanceOf(User::class, $response);
        self::assertEquals($value, $this->user->getPassword());
    }

    public function testIsArchive(): void
    {
        $value = true;

        $response = $this->user->setIsArchive($value);

        self::assertInstanceOf(User::class, $response);
        self::assertEquals($value, $this->user->getIsArchive());
    }
}
