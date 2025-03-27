<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test to add a new service.
     *
     * @return void
     */
    public function test_can_add_new_service()
    {
        $serviceData = [
            'nama' => 'Test Service',
            'deskripsi' => 'This is a test service description.',
            'harga' => 999.99,
        ];

        $response = $this->post('/services', $serviceData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('services', $serviceData);
    }

    /**
     * Test to get all services.
     *
     * @return void
     */
    public function test_can_get_all_services()
    {
        Service::factory()->count(5)->create();

        $response = $this->get('/services');

        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }
}
