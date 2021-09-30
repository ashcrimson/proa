<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["name" => "Developer"]);
        Role::create(["name" => "Superadmin"]);


        $role= Role::create(["name" => "Admin"]);
        $role->syncPermissions(Permission::pluck('name')->toArray());

        /**
         * @var Role $role
         */
        $role= Role::create(["name" => "Médico"]);
        $role->syncPermissions([
            'Ver Solicitudes',
            'Crear Solicitudes',
            'Editar Solicitudes',
            'Eliminar Solicitudes',

            'Ver Pacientes',
            'Ver Microorganismos',
            'Ver Medicamentos',
            'Ver Diagnosticos',
            'Ver Cultivos',
        ]);
        $role->options()->sync([
            12, //solicitudes
            13, //Nueva Solicitud
            14, //Pacientes
        ]);

        $role = Role::create(["name" => "Infectólogo"]);
        $role->syncPermissions([
            'Ver Solicitudes',
            'Aprobar Solicitudes',
            'Rechazar Solicitudes',
            'Editar Solicitud Rechazada',
            'Crear Solicitudes',
            'Editar Solicitudes',

            'Ver Pacientes',
            'Ver Microorganismos',
            'Ver Medicamentos',
            'Ver Diagnosticos',
            'Ver Cultivos',
        ]);
        $role->options()->sync([
            12, //solicitudes
            14, //Pacientes
        ]);

        $role = Role::create(["name" => "QF clínico"]);
        $role->syncPermissions([
            'Despachar Solicitudes',
            'Ver Solicitudes',

            'Ver Pacientes',
            'Ver Microorganismos',
            'Ver Medicamentos',
            'Ver Diagnosticos',
            'Ver Cultivos',
        ]);
        $role->options()->sync([
            12, //solicitudes
            14, //Pacientes
        ]);

        $role = Role::create(["name" => "Técnico"]);
        $role->syncPermissions([
            'Ver Solicitudes',

            'Ver Pacientes',
            'Ver Microorganismos',
            'Ver Medicamentos',
            'Ver Diagnosticos',
            'Ver Cultivos',
        ]);
        $role->options()->sync([
            12, //solicitudes
            14, //Pacientes
        ]);

        $role = Role::create(["name" => "Enfermera"]);
        $role->syncPermissions([
            'Ver Solicitudes',

            'Ver Pacientes',
            'Ver Microorganismos',
            'Ver Medicamentos',
            'Ver Diagnosticos',
            'Ver Cultivos',
        ]);
        $role->options()->sync([
            12, //solicitudes
            14, //Pacientes
        ]);


    }
}
