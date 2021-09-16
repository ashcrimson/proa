<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SolicitudEstado;

class SolicitudEstadoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_solicitud_estado()
    {
        $solicitudEstado = factory(SolicitudEstado::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/solicitud_estados', $solicitudEstado
        );

        $this->assertApiResponse($solicitudEstado);
    }

    /**
     * @test
     */
    public function test_read_solicitud_estado()
    {
        $solicitudEstado = factory(SolicitudEstado::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/solicitud_estados/'.$solicitudEstado->id
        );

        $this->assertApiResponse($solicitudEstado->toArray());
    }

    /**
     * @test
     */
    public function test_update_solicitud_estado()
    {
        $solicitudEstado = factory(SolicitudEstado::class)->create();
        $editedSolicitudEstado = factory(SolicitudEstado::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/solicitud_estados/'.$solicitudEstado->id,
            $editedSolicitudEstado
        );

        $this->assertApiResponse($editedSolicitudEstado);
    }

    /**
     * @test
     */
    public function test_delete_solicitud_estado()
    {
        $solicitudEstado = factory(SolicitudEstado::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/solicitud_estados/'.$solicitudEstado->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/solicitud_estados/'.$solicitudEstado->id
        );

        $this->response->assertStatus(404);
    }
}
