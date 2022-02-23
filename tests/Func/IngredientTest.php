<?php

namespace App\Tests\Func;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IngredientTest extends AbstractEndPoint
{
    private string $ingredientPayload = '{  
    "iNGName": "Patate",
    "iNGAllergen": true,
    "iNGVege": true,
    "iNGUnit": "kg",
    "iNGPrice": 22,
    "iNGIsArchive": true,
    "iNGDateEdit": "2022-02-23T12:04:19.409Z"
    }';

    public function testGetIngredients(): void
    {
        $response = $this->getResponseFromRequest(Request::METHOD_GET, 'api/ingredients');
        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);

        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecode);

        var_dump($responseDecode);
    }

    public function testPostIngredient(): void
    {
        $response = $this->getResponseFromRequest(
            Request::METHOD_POST,
            'api/ingredients',
            $this->getPayload()
        );
        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);

        var_dump($responseDecode);

        self::assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecode);
    }

    private function getPayload(): string
    {
        return sprintf($this->ingredientPayload);
    }
}
