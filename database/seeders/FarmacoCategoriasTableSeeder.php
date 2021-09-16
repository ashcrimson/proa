<?php

namespace Database\Seeders;

use App\Models\FarmacoCategoria;
use Illuminate\Database\Seeder;

class FarmacoCategoriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('farmaco_categorias')->delete();


        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antibiótico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Analgésico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Anestésico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Ansiolítico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Anticolinérgico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Anticonceptivo']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Anticonvulsivo']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antidepresivo']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antidiabético']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antiemético']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antihelmíntico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antihipertensivo']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antihistamínico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antineoplásico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antiinflamatorio']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antiparkinsoniano']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antimicótico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antipirético']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antipsicótico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antitusivo']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Antídoto']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Broncodilatador']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Cardiotónico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Citostático o citotóxico o quimioterápico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Hipnótico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Hormonoterápico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Quimioterápico']);
        factory(FarmacoCategoria::class,1)->create(['nombre' => 'Relajante muscular']);


    }
}
