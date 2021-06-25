<?php

namespace App\Tests\Integration\Domains\User;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetUserListControllerTest extends WebTestCase
{
    public function testListingIsSuccessfull()
    {
        $client = $this->createClient();
        $client->request(
            'GET',
            '/user'
        );

        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();

        $userData = json_decode($response, true);

        $this->assertNotEmpty($userData);
        foreach ($userData as $user) {
            $this->assertArrayHasKey('id', $user);
            $this->assertArrayHasKey('email', $user);
            $this->assertArrayHasKey('userName', $user);
        }
    }
}
