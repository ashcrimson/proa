

<div class="col-6 text-left pl-3 text-lg">
    Estado:
    <span class="badge badge-info">
        {{$solicitud->estado->nombre}}
    </span>
</div>
<div class="col-6 text-right pl-3">
    <a href="{!! route('solicitudes.index') !!}" class="btn btn-outline-secondary mr-3">
        {{__('Back')}}
    </a>

    <a href="{!! route('solicitudes.imprime.receta',$solicitud->id) !!}" target="_blank" class="btn btn-outline-info mr-3">
        {{__('Imprimir')}}
    </a>
    &nbsp;

    <!--            validar sí en el estado que esta puede despachar
    ------------------------------------------------------------------------>
   @if($solicitud->puedeAprobar())
      @can('Rechazar Solicitudes')
           <form action="{{ route('solicitudes.rechazar.store', $solicitud->id) }}" class="mr-3" method="post" style="display: inline">
              @csrf

               <button type="submit"  class='btn btn-danger'>
                   <i class="fa fa-ban"></i> Rechazar
              </button>&nbsp;
         </form>
       @endcan
    @endif


    <!--            validar sí en el estado que esta puede despachar
    ------------------------------------------------------------------------>
    @if($solicitud->puedeDespachar())
        @can('Despachar Solicitudes')
            <form action="{{ route('solicitudes.despachar.store', $solicitud->id) }}" class="mr-3" method="post" style="display: inline">
                @csrf

                <button type="submit" class='btn btn-success'>
                    <i class="fa fa-boxes"></i> Despachar
                </button>&nbsp;
            </form>
        @endcan
    @endif

    @can('Cerrar Solicitud')

        <a href="{!! route('solicitudes.cerrar',$solicitud->id) !!}" class="btn btn-outline-danger ml-2">
            <i class="fa fa-ban"></i> Cerrar Solicitud
        </a>
    @endcan

<!--            validar sí en el estado que esta puede aprobar
------------------------------------------------------------------------>
    @if($solicitud->puedeAprobar())
        @can('Aprobar Solicitudes')
            <form action="{{ route('solicitudes.aprobar.store', $solicitud->id) }}" class="mr-2" method="post" style="display: inline">
                @csrf

                <button type="submit" class='btn btn-success'>
                    <i class="fa fa-check"></i> Aprobar
                </button>
            </form>
        @endcan
    @endif



</div>
