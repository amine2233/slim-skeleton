<?php
declare(strict_types=1);

namespace App\Tests\Application\Actions;

use App\Application\Actions\ActionPayload;
use App\Tests\TestCase;

class DefaultTest extends TestCase
{
    public function testIndex()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET', '/');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $this->assertEquals("Hello world!", $payload);
    }

    public function testJson()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET','/json');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $arrayTestResponse = ['Hello' => 'world'];
        $expectedPayload = new ActionPayload(200, $arrayTestResponse);
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);
        $this->assertEquals($serializedPayload, $payload);
    }
}
