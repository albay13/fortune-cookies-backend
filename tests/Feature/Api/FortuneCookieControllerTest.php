<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FortuneCookieControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp() : void{
        parent::setUp();

        $this->artisan('db:seed');
    }

    /** @test */
    public function can_return_collection_of_fortune(){
        $fortune = $this->create('Api\\Fortune', [], false);


        $response = $this->json('GET', 'api/fortunes');

        \Log::info($response->getContent());

        $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => ['message', 'id'],
            ],
            'links' => ['first', 'last', 'next', 'prev'],
            'meta' => ['current_page', 'from', 'last_page', 'path', 'per_page', 'to', 'total']
        ]);
    }

    /** @test */
    public function can_update_fortune(){
        $fortune = $this->create('Api\\Fortune', [], false);

        $response = $this->json('PATCH', "api/fortunes/$fortune->id", [
            'message' => $fortune."_updated"
        ]);
        \Log::info($response->getContent());
        $response->assertStatus(200)
        ->assertExactJson([
            'id' => $fortune->id,
            'message' => $fortune."_updated",
            'updated_at' => (string) $fortune->updated_at,
            'created_at' => (string) $fortune->created_at,
        ]);
        

        $this->assertDatabaseHas('fortunes', [
            'id' => $fortune->id,
            'message' => $fortune."_updated"
        ]);
    }
}
