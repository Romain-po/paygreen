<?php

namespace App\Tests\Integration\Domains\App;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginControllerTest extends WebTestCase
{
    public function testLoginIsSuccessfull()
    {
        $client = $this->createClient();
        $client->request(
            'POST',
            '/login',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
        );

        $this->assertResponseIsSuccessful();

        $response = $client->getResponse();
        $responseData = json_decode($response, true);

        $this->assertNotEmpty($responseData);
        $this->assertArrayHasKey('userName', $responseData);
        $this->assertArrayHasKey('roles', $responseData);
    }
}
