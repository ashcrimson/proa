<?php

namespace Database\Seeders;

use App\Models\Diagnostico;
use Illuminate\Database\Seeder;

class DiagnosticosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('diagnosticos')->delete();

        factory(Diagnostico::class,1)->create(['nombre' => 'Neumonia']);
        factory(Diagnostico::class,1)->create(['nombre' => 'Celulitis/Infección de Partes blandas']);
        factory(Diagnostico::class,1)->create(['nombre' => 'Urinaria']);
        factory(Diagnostico::class,1)->create(['nombre' => 'Infección CVC']);
        factory(Diagnostico::class,1)->create(['nombre' => 'Peritoneal']);
        factory(Diagnostico::class,1)->create(['nombre' => 'Pie diabético']);
        factory(Diagnostico::class,1)->create(['nombre' => 'Infección SNC']);
        factory(Diagnostico::class,1)->create(['nombre' => 'Infección de prótesis/Osteosíntesis']);
        factory(Diagnostico::class,1)->create(['nombre' => 'Infección de sitio quirúrgico']);
        factory(Diagnostico::class,1)->create(['nombre' => 'Covid-19']);
        factory(Diagnostico::class,1)->create(['nombre' => 'Bacteremia']);
        factory(Diagnostico::class,1)->create(['nombre' => 'Otro']);

    }
}
