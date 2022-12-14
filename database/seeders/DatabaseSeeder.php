<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $this->call(OptionsTableSeeder::class);
        $this->call(ConfigurationsTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SolicitudEstadosTableSeeder::class);
        $this->call(MicroorganismosTableSeeder::class);
        $this->call(FarmacoCategoriasTableSeeder::class);
        $this->call(MedicamentosTableSeeder::class);
        $this->call(CultivosTableSeeder::class);
        $this->call(DiagnosticosTableSeeder::class);

        if (app()->environment()=='local'){
            $this->call(PacientesTableSeeder::class);
            $this->call(SolicitudesTableSeeder::class);
        }
    }
}
