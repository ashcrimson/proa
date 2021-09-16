<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SolicitudMedicamento;

class SolicitudMedicamentoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_solicitud_medicamento()
    {
        $solicitudMedicamento = factory(SolicitudMedicamento::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/solicitud_medicamentos', $solicitudMedicamento
        );

        $this->assertApiResponse($solicitudMedicamento);
    }

    /**
     * @test
     */
    public function test_read_solicitud_medicamento()
    {
        $solicitudMedicamento = factory(SolicitudMedicamento::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/solicitud_medicamentos/'.$solicitudMedicamento->id
        );

        $this->assertApiResponse($solicitudMedicamento->toArray());
    }

    /**
     * @test
     */
    public function test_update_solicitud_medicamento()
    {
        $solicitudMedicamento = factory(SolicitudMedicamento::class)->create();
        $editedSolicitudMedicamento = factory(SolicitudMedicamento::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/solicitud_medicamentos/'.$solicitudMedicamento->id,
            $editedSolicitudMedicamento
        );

        $this->assertApiResponse($editedSolicitudMedicamento);
    }

    /**
     * @test
     */
    public function test_delete_solicitud_medicamento()
    {
        $solicitudMedicamento = factory(SolicitudMedicamento::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/solicitud_medicamentos/'.$solicitudMedicamento->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/solicitud_medicamentos/'.$solicitudMedicamento->id
        );

        $this->response->assertStatus(404);
    }
}
