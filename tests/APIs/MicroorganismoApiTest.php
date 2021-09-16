<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Microorganismo;

class MicroorganismoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_microorganismo()
    {
        $microorganismo = factory(Microorganismo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/microorganismos', $microorganismo
        );

        $this->assertApiResponse($microorganismo);
    }

    /**
     * @test
     */
    public function test_read_microorganismo()
    {
        $microorganismo = factory(Microorganismo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/microorganismos/'.$microorganismo->id
        );

        $this->assertApiResponse($microorganismo->toArray());
    }

    /**
     * @test
     */
    public function test_update_microorganismo()
    {
        $microorganismo = factory(Microorganismo::class)->create();
        $editedMicroorganismo = factory(Microorganismo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/microorganismos/'.$microorganismo->id,
            $editedMicroorganismo
        );

        $this->assertApiResponse($editedMicroorganismo);
    }

    /**
     * @test
     */
    public function test_delete_microorganismo()
    {
        $microorganismo = factory(Microorganismo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/microorganismos/'.$microorganismo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/microorganismos/'.$microorganismo->id
        );

        $this->response->assertStatus(404);
    }
}
