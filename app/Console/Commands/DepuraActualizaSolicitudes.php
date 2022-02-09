<?php

namespace App\Console\Commands;

use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use nusoap_client;

class DepuraActualizaSolicitudes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'depura_actualiza_solicitudes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->info('Actualizando descserv solicitudes y depurando rechazadas y vencidas...');

        $actualizadas = 0;
        $depuradas = 0;
        $solicitudes = Solicitud::with('paciente')->get();

        /**
         * @var Solicitud $solicitud
         */
        foreach ($solicitudes as $index => $solicitud) {

            $depurada = $solicitud->depurar();

//
            //si no se debe borrar por días pasados
            if (!$depurada){

                if($solicitud->paciente){

//                    $params = array('run' => $solicitud->paciente->run);
//                    $client = new nusoap_client('http://172.25.16.18/bus/webservice/ws.php?wsdl');
//                    $client->response_timeout = 5;
//                    $response = $client->call('buscarDetallePersonaPROA', $params);
//
//                    $response = json_decode($response, true);

                    $solicitud->descserv = $response["hosp"]['descserv'] ?? 'No Hospitalizado';
                    $solicitud->save();
                    $actualizadas++;
                }
            }else{
                $depuradas++;
            }

        }


        $this->info('Depuradas: '.$depurada);
        $this->info('Actualizadas: '.$actualizadas);

        $contenido = Carbon::now()->format('d/m/Y H:i:s a')." -> Se actualizo y depuro solicitudes";

        File::put(base_path('log_schedule.txt'),$contenido);
    }
}
