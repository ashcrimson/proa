<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cultivo;

class CultivoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cultivo()
    {
        $cultivo = factory(Cultivo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cultivos', $cultivo
        );

        $this->assertApiResponse($cultivo);
    }

    /**
     * @test
     */
    public function test_read_cultivo()
    {
        $cultivo = factory(Cultivo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/cultivos/'.$cultivo->id
        );

        $this->assertApiResponse($cultivo->toArray());
    }

    /**
     * @test
     */
    public function test_update_cultivo()
    {
        $cultivo = factory(Cultivo::class)->create();
        $editedCultivo = factory(Cultivo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cultivos/'.$cultivo->id,
            $editedCultivo
        );

        $this->assertApiResponse($editedCultivo);
    }

    /**
     * @test
     */
    public function test_delete_cultivo()
    {
        $cultivo = factory(Cultivo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cultivos/'.$cultivo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cultivos/'.$cultivo->id
        );

        $this->response->assertStatus(404);
    }
}
