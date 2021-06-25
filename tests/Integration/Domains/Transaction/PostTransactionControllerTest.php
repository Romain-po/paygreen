<?php

namespace App\Tests\Integration\Domains\Transaction;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostTransactionControllerTest extends WebTestCase
{
    /**
     * @dataProvider getTransactionData
     */
    public function testPostTransactionIsSuccessfull(array $transactionData)
    {
        $content = json_encode($transactionData);

        $client = $this->createClient();
        $client->request(
            'POST',
            '/user',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            $content,
        );

        $this->assertResponseIsSuccessful();

        $response = $client->getResponse();
        $responseData = json_decode($response, true);

        $this->assertNotEmpty($responseData);
        $this->assertArrayHasKey('id', $responseData);
        $this->assertArrayHasKey('reference', $responseData);
        $this->assertArrayHasKey('active', $responseData);
        $this->assertArrayHasKey('createdAt', $responseData);
    }

    public function getTransactionData()
    {
        yield [
            'reference' => 'TestTransacFalse',
            'isActive' => false,
        ];

        yield [
            'reference' => 'TestTransacTrue',
            'isActive' => true,
        ];
    }

}
