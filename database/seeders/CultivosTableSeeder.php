<?php

namespace Database\Seeders;

use App\Models\Cultivo;
use Illuminate\Database\Seeder;

class CultivosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('cultivos')->delete();

        factory(Cultivo::class,1)->create(['nombre' => 'Urocultivo']);
        factory(Cultivo::class,1)->create(['nombre' => 'Hemocultivo']);
        factory(Cultivo::class,1)->create(['nombre' => 'Cultivo de secreción ']);
        factory(Cultivo::class,1)->create(['nombre' => 'Cultivo de Expectoración ']);
        factory(Cultivo::class,1)->create(['nombre' => 'Cultivo de Tejidos']);
        factory(Cultivo::class,1)->create(['nombre' => 'Cultivo LCR']);
        factory(Cultivo::class,1)->create(['nombre' => 'Deposiciones']);
        factory(Cultivo::class,1)->create(['nombre' => 'Otros']);

    }
}
