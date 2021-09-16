<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Paciente;

class PacienteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_paciente()
    {
        $paciente = factory(Paciente::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pacientes', $paciente
        );

        $this->assertApiResponse($paciente);
    }

    /**
     * @test
     */
    public function test_read_paciente()
    {
        $paciente = factory(Paciente::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pacientes/'.$paciente->id
        );

        $this->assertApiResponse($paciente->toArray());
    }

    /**
     * @test
     */
    public function test_update_paciente()
    {
        $paciente = factory(Paciente::class)->create();
        $editedPaciente = factory(Paciente::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pacientes/'.$paciente->id,
            $editedPaciente
        );

        $this->assertApiResponse($editedPaciente);
    }

    /**
     * @test
     */
    public function test_delete_paciente()
    {
        $paciente = factory(Paciente::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pacientes/'.$paciente->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pacientes/'.$paciente->id
        );

        $this->response->assertStatus(404);
    }
}
