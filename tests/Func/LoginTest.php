<?php

namespace App\Tests\Func;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginTest extends AbstractEndPoint
{
    private string $userLoginPayload = '{"username":"anais.leduc@fischer.fr", "password": "password"}';

    public function testLogin(): void
    {
        $response = $this->getResponseFromRequest(
            Request::METHOD_POST,
            'api/login',
            $this->getPayload()
        );
        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);

        var_dump($responseDecode);

        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecode);
    }

    private function getPayload(): string
    {
        return sprintf($this->userLoginPayload);
    }
}
