<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Medicamento;

class MedicamentoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_medicamento()
    {
        $medicamento = factory(Medicamento::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/medicamentos', $medicamento
        );

        $this->assertApiResponse($medicamento);
    }

    /**
     * @test
     */
    public function test_read_medicamento()
    {
        $medicamento = factory(Medicamento::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/medicamentos/'.$medicamento->id
        );

        $this->assertApiResponse($medicamento->toArray());
    }

    /**
     * @test
     */
    public function test_update_medicamento()
    {
        $medicamento = factory(Medicamento::class)->create();
        $editedMedicamento = factory(Medicamento::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/medicamentos/'.$medicamento->id,
            $editedMedicamento
        );

        $this->assertApiResponse($editedMedicamento);
    }

    /**
     * @test
     */
    public function test_delete_medicamento()
    {
        $medicamento = factory(Medicamento::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/medicamentos/'.$medicamento->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/medicamentos/'.$medicamento->id
        );

        $this->response->assertStatus(404);
    }
}
