<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SolicitudMicroorganismo;

class SolicitudMicroorganismoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_solicitud_microorganismo()
    {
        $solicitudMicroorganismo = factory(SolicitudMicroorganismo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/solicitud_microorganismos', $solicitudMicroorganismo
        );

        $this->assertApiResponse($solicitudMicroorganismo);
    }

    /**
     * @test
     */
    public function test_read_solicitud_microorganismo()
    {
        $solicitudMicroorganismo = factory(SolicitudMicroorganismo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/solicitud_microorganismos/'.$solicitudMicroorganismo->id
        );

        $this->assertApiResponse($solicitudMicroorganismo->toArray());
    }

    /**
     * @test
     */
    public function test_update_solicitud_microorganismo()
    {
        $solicitudMicroorganismo = factory(SolicitudMicroorganismo::class)->create();
        $editedSolicitudMicroorganismo = factory(SolicitudMicroorganismo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/solicitud_microorganismos/'.$solicitudMicroorganismo->id,
            $editedSolicitudMicroorganismo
        );

        $this->assertApiResponse($editedSolicitudMicroorganismo);
    }

    /**
     * @test
     */
    public function test_delete_solicitud_microorganismo()
    {
        $solicitudMicroorganismo = factory(SolicitudMicroorganismo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/solicitud_microorganismos/'.$solicitudMicroorganismo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/solicitud_microorganismos/'.$solicitudMicroorganismo->id
        );

        $this->response->assertStatus(404);
    }
}
