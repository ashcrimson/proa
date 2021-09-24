

<div class="col-12 text-right pl-3">
    <a href="{!! route('solicitudes.index') !!}" class="btn btn-outline-secondary" style="margin-left: 10px;">
        {{__('Back')}}
    </a>
    &nbsp;


    <!--            validar sí en el estado que esta puede despachar
    ------------------------------------------------------------------------>
    @if($solicitud->puedeDespachar())
        @can('Despachar Solicitudes')
            <form action="{{ route('solicitudes.despachar.store', $solicitud->id) }}" method="post" style="display: inline">
                @csrf

                <button type="submit" data-toggle="tooltip" title="Despachar" class='btn btn-success '>
                    <i class="fa fa-boxes"></i> Despachar
                </button>&nbsp;
            </form>
        @endcan
    @endif

<!--            validar sí en el estado que esta puede aprobar
------------------------------------------------------------------------>
    @if($solicitud->puedeAprobar())
        @can('Aprobar Solicitudes')
            <form action="{{ route('solicitudes.aprobar.store', $solicitud->id) }}" method="post" style="display: inline">
                @csrf

                <button type="submit" data-toggle="tooltip" title="Aprobar" class='btn btn-success '>
                    <i class="fa fa-check"></i> Aprobar
                </button>
            </form>
        @endcan
    @endif



</div>
