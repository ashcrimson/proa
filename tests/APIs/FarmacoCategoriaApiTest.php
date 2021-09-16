<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FarmacoCategoria;

class FarmacoCategoriaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_farmaco_categoria()
    {
        $farmacoCategoria = factory(FarmacoCategoria::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/farmaco_categorias', $farmacoCategoria
        );

        $this->assertApiResponse($farmacoCategoria);
    }

    /**
     * @test
     */
    public function test_read_farmaco_categoria()
    {
        $farmacoCategoria = factory(FarmacoCategoria::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/farmaco_categorias/'.$farmacoCategoria->id
        );

        $this->assertApiResponse($farmacoCategoria->toArray());
    }

    /**
     * @test
     */
    public function test_update_farmaco_categoria()
    {
        $farmacoCategoria = factory(FarmacoCategoria::class)->create();
        $editedFarmacoCategoria = factory(FarmacoCategoria::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/farmaco_categorias/'.$farmacoCategoria->id,
            $editedFarmacoCategoria
        );

        $this->assertApiResponse($editedFarmacoCategoria);
    }

    /**
     * @test
     */
    public function test_delete_farmaco_categoria()
    {
        $farmacoCategoria = factory(FarmacoCategoria::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/farmaco_categorias/'.$farmacoCategoria->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/farmaco_categorias/'.$farmacoCategoria->id
        );

        $this->response->assertStatus(404);
    }
}
