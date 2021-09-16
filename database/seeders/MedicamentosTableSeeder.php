<?php

namespace Database\Seeders;

use App\Models\Medicamento;
use Illuminate\Database\Seeder;

class MedicamentosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('medicamentos')->delete();

        factory(Medicamento::class,1)->create(['nombre' => 'Cefepime']);
        factory(Medicamento::class,1)->create(['nombre' => 'Ceftarolina']);
        factory(Medicamento::class,1)->create(['nombre' => 'Piperacilina/tazobactam']);
        factory(Medicamento::class,1)->create(['nombre' => 'Imipenem y Cilastatina']);
        factory(Medicamento::class,1)->create(['nombre' => 'Meropenem']);
        factory(Medicamento::class,1)->create(['nombre' => 'Ertapenem']);
        factory(Medicamento::class,1)->create(['nombre' => 'Ceftazidima-Avibactam']);
        factory(Medicamento::class,1)->create(['nombre' => 'Ceftolozano-tazobactam']);
        factory(Medicamento::class,1)->create(['nombre' => 'Tigeciclina ']);
        factory(Medicamento::class,1)->create(['nombre' => 'Vancomicina']);
        factory(Medicamento::class,1)->create(['nombre' => 'Linezolid']);
        factory(Medicamento::class,1)->create(['nombre' => 'Teicoplanina']);
        factory(Medicamento::class,1)->create(['nombre' => 'Fosfomicina ev']);
        factory(Medicamento::class,1)->create(['nombre' => 'Daptomicina']);
        factory(Medicamento::class,1)->create(['nombre' => 'Aztreonam']);
        factory(Medicamento::class,1)->create(['nombre' => 'Colistín']);
        factory(Medicamento::class,1)->create(['nombre' => 'Fluconazol endovenoso']);
        factory(Medicamento::class,1)->create(['nombre' => 'Anfotericina B deoxicolato']);
        factory(Medicamento::class,1)->create(['nombre' => 'Anfotericina B liposomal']);
        factory(Medicamento::class,1)->create(['nombre' => 'Anidulafungina']);
        factory(Medicamento::class,1)->create(['nombre' => 'Caspofungina ']);
        factory(Medicamento::class,1)->create(['nombre' => 'Micafungina']);
        factory(Medicamento::class,1)->create(['nombre' => 'Voriconazol ']);
        factory(Medicamento::class,1)->create(['nombre' => 'Aciclovir endovenoso']);
        factory(Medicamento::class,1)->create(['nombre' => 'Ganciclovir']);
        factory(Medicamento::class,1)->create(['nombre' => 'Foscarnet']);


        /**
         * @var Medicamento $medicamento
         */
        foreach (Medicamento::all() as $index => $medicamento) {

            //asociar la categoría atibiotico a todos
            $medicamento->categorias()->sync([1]);
        }


    }
}
