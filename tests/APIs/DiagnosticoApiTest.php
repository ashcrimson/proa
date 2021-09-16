<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Diagnostico;

class DiagnosticoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_diagnostico()
    {
        $diagnostico = factory(Diagnostico::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/diagnosticos', $diagnostico
        );

        $this->assertApiResponse($diagnostico);
    }

    /**
     * @test
     */
    public function test_read_diagnostico()
    {
        $diagnostico = factory(Diagnostico::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/diagnosticos/'.$diagnostico->id
        );

        $this->assertApiResponse($diagnostico->toArray());
    }

    /**
     * @test
     */
    public function test_update_diagnostico()
    {
        $diagnostico = factory(Diagnostico::class)->create();
        $editedDiagnostico = factory(Diagnostico::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/diagnosticos/'.$diagnostico->id,
            $editedDiagnostico
        );

        $this->assertApiResponse($editedDiagnostico);
    }

    /**
     * @test
     */
    public function test_delete_diagnostico()
    {
        $diagnostico = factory(Diagnostico::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/diagnosticos/'.$diagnostico->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/diagnosticos/'.$diagnostico->id
        );

        $this->response->assertStatus(404);
    }
}
