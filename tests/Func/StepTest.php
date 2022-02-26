<?php

namespace App\Tests\Func;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StepTest extends AbstractEndPoint
{
    private string $stepPayload = '{
        "sTEOrder": 1,
        "sTEDescription": "Description",
        "sTEDateEdit": "2022-02-23T12:01:22.129Z"
    }';
    public function testGetSteps(): void
    {
        $response = $this->getResponseFromRequest(Request::METHOD_GET, 'api/steps');
        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);

        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecode);
    }

    public function testPostStep(): void
    {
        $response = $this->getResponseFromRequest(
            Request::METHOD_POST,
            'api/steps',
            $this->getPayload()
        );
        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);

        self::assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecode);
    }

    private function getPayload(): string
    {
        return sprintf($this->stepPayload);
    }
}
