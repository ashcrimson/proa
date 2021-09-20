<?php

Route::group(['as'=>'api.','namespace' => 'API'], function () {

    Route::resource('options', 'OptionAPIController');



    Route::group(['middleware' => 'auth:api'], function () {

        Route::resource('permissions', 'PermissionAPIController');

        Route::resource('roles', 'RoleAPIController');

        Route::resource('users', 'UserAPIController');
        Route::get('user/add/shortcut/{user}', 'UserAPIController@addShortcut')->name('users.add_shortcut');
        Route::get('user/remove/shortcut/{user}', 'UserAPIController@removeShortcut')->name('users.remove_shortcut');


        Route::resource('solicitud_estados', 'SolicitudEstadoAPIController');

        Route::resource('pacientes', 'PacienteAPIController');

        Route::resource('cultivos', 'CultivoAPIController');

        Route::resource('diagnosticos', 'DiagnosticoAPIController');

        Route::resource('microorganismos', 'MicroorganismoAPIController');

        Route::resource('farmaco_categorias', 'FarmacoCategoriaAPIController');

        Route::resource('medicamentos', 'MedicamentoAPIController');

        Route::resource('solicitudes', 'SolicitudAPIController');

        Route::resource('solicitud_medicamentos', 'SolicitudMedicamentoAPIController');

        Route::resource('solicitud_microorganismos', 'SolicitudMicroorganismoAPIController');
    });


});


