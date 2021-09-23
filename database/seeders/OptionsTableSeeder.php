<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('options')->delete();
        
        \DB::table('options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'option_id' => NULL,
                'nombre' => 'Dashboard',
                'ruta' => 'dashboard',
                'descripcion' => NULL,
                'icono_l' => 'fa-chart-line',
                'icono_r' => NULL,
                'orden' => 0,
                'color' => 'bg-teal',
                'dev' => 0,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2020-08-26 11:51:32',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'option_id' => NULL,
                'nombre' => 'Admin',
                'ruta' => '',
                'descripcion' => NULL,
                'icono_l' => 'fa-tools',
                'icono_r' => NULL,
                'orden' => 8,
                'color' => 'bg-teal',
                'dev' => 0,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'option_id' => 2,
                'nombre' => 'Usuarios',
                'ruta' => 'users.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-users',
                'icono_r' => NULL,
                'orden' => 9,
                'color' => 'bg-teal',
                'dev' => 0,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'option_id' => 2,
                'nombre' => 'Roles',
                'ruta' => 'roles.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-user-tag',
                'icono_r' => NULL,
                'orden' => 10,
                'color' => 'bg-info',
                'dev' => 0,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'option_id' => 2,
                'nombre' => 'Permisos',
                'ruta' => 'permissions.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-key',
                'icono_r' => NULL,
                'orden' => 11,
                'color' => 'bg-teal',
                'dev' => 0,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'option_id' => 2,
                'nombre' => 'Configuraciones',
                'ruta' => 'profile.business',
                'descripcion' => NULL,
                'icono_l' => 'fa-cogs',
                'icono_r' => NULL,
                'orden' => 12,
                'color' => 'bg-teal',
                'dev' => 0,
                'created_at' => '2021-03-14 21:17:37',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'option_id' => NULL,
                'nombre' => 'Developer',
                'ruta' => 'x',
                'descripcion' => NULL,
                'icono_l' => 'fa-file-code',
                'icono_r' => NULL,
                'orden' => 13,
                'color' => 'bg-teal',
                'dev' => 1,
                'created_at' => '2021-03-14 21:11:34',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'option_id' => 7,
                'nombre' => 'Prueba API\'S',
                'ruta' => 'dev.prueba.api',
                'descripcion' => NULL,
                'icono_l' => 'fa-check-circle',
                'icono_r' => NULL,
                'orden' => 16,
                'color' => 'bg-teal',
                'dev' => 1,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2021-09-23 11:46:06',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'option_id' => 7,
                'nombre' => 'Configuraciones',
                'ruta' => 'dev.configurations.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-cogs',
                'icono_r' => NULL,
                'orden' => 15,
                'color' => 'bg-teal',
                'dev' => 1,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'option_id' => 7,
                'nombre' => 'Clientes Passport',
                'ruta' => 'dev.passport.clients',
                'descripcion' => NULL,
                'icono_l' => 'fa-passport',
                'icono_r' => NULL,
                'orden' => 17,
                'color' => 'bg-teal',
                'dev' => 1,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2021-09-23 11:46:06',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'option_id' => 7,
                'nombre' => 'Menu',
                'ruta' => 'options.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-list',
                'icono_r' => NULL,
                'orden' => 14,
                'color' => 'bg-teal',
                'dev' => 1,
                'created_at' => '2020-08-26 11:46:42',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'option_id' => NULL,
                'nombre' => 'Solicitudes',
                'ruta' => 'solicitudes.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-list',
                'icono_r' => NULL,
                'orden' => 3,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:31:06',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'option_id' => NULL,
                'nombre' => 'Nueva Solicitud',
                'ruta' => 'solicitudes.create',
                'descripcion' => NULL,
                'icono_l' => 'fa-plus',
                'icono_r' => NULL,
                'orden' => 2,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:31:30',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'option_id' => NULL,
                'nombre' => 'Pacientes',
                'ruta' => 'pacientes.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-hospital-user',
                'icono_r' => NULL,
                'orden' => 1,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:45:27',
                'updated_at' => '2021-09-16 15:45:38',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'option_id' => NULL,
                'nombre' => 'Mantemedores',
                'ruta' => 'x',
                'descripcion' => NULL,
                'icono_l' => 'fa-list-alt',
                'icono_r' => NULL,
                'orden' => 4,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-22 16:08:39',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'option_id' => 15,
                'nombre' => 'Estados Soliciutdes',
                'ruta' => 'solicitudEstados.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 5,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:41:55',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'option_id' => 15,
                'nombre' => 'Admin Medicamentos',
                'ruta' => 'medicamentos.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 6,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:42:25',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'option_id' => 15,
                'nombre' => 'Admin Microorganismos',
                'ruta' => 'microorganismos.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-circle-notch',
                'icono_r' => NULL,
                'orden' => 7,
                'color' => NULL,
                'dev' => 0,
                'created_at' => '2021-09-16 15:42:57',
                'updated_at' => '2021-09-23 11:46:05',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}