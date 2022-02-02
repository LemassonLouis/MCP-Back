<?php

namespace App\Tests\Func;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Ingredient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IngredientTest extends AbstractEndPoint
{
    // private string $ingredientPayload;
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

    // public function testPostIngredient(): void
    // {
    //     $response = $this->getResponseFromRequest(
    //         Request::METHOD_POST,
    //         'api/ingredients',
    //         $this->getPayload()
    //     );
    //     $responseContent = $response->getContent();
    //     $responseDecode = json_decode($responseContent);

    //     var_dump($responseDecode);

    //     self::assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
    //     self::assertJson($responseContent);
    //     self::assertNotEmpty($responseDecode);
    // }

    // private function getPayload(): string
    // {
    //     $faker = Factory::create('fr_FR');
    //     $ingredient = new Ingredient;

    //     dd(sprintf(
    //         $this->ingredientPayload,
    //         $ingredient->setINGName($faker->word())
    //             ->setINGAllergen($faker->boolean(20))
    //             ->setINGVege($faker->boolean(30))
    //             ->setINGPrice($faker->numberBetween(0, 20))
    //             ->setINGIsArchive($faker->boolean(80))
    //             ->setINGUnit('kg')
    //             ->setINGDateEdit(new \DateTimeImmutable())
    //     ));
    // }
}
