

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
