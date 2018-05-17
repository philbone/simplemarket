<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiUserTest extends TestCase
{
    /**
     * @return void
     * @group controllers
     */
    public function testGetUser200($trueIdUser = 1)
    {
        $responseAll = $this->json('GET', '/users');

        $responseAll
            ->assertStatus($this::HTTP_OK)
            ->assertJsonFragment(['data'])
            ->assertJsonCount(100, 'data');


        $responseOne = $this->json('GET', "/users/{$trueIdUser}");

        $responseOne
            ->assertStatus($this::HTTP_OK)
            ->assertJsonFragment(['id' => $trueIdUser])
            ->assertJsonCount(1);

    }

    /**
     * @return void
     * @group controllers
     */
    public function testGetUser404()
    {
        $stringFakeId = str_random(3);
        $numericFakeId = mt_rand(10000, 99999);

        echo $stringFakeId;

        $responseString = $this->json('GET', "/users/{$stringFakeId}");

        $responseString
            ->assertNotFound()
            ->assertJson(['code' => $this::HTTP_NOT_FOUND]);

        $responseNumeric = $this->json('GET', "/users/{$numericFakeId}");

        $responseNumeric
            ->assertNotFound()
            ->assertJson(['code' => $this::HTTP_NOT_FOUND]);
    }

}
