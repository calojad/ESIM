<div class="col-md-7 col-sm-6 col-md-offset-2 col-sm-offset-0">
    <!-- Nombre Field -->
    <div class="col-md-4">
        <dl class="col-md-12">
            <dt>Nombre:</dt>
            <dd>{!! $grupoValor->nombre !!}</dd>
        </dl>
    </div>

    <!-- Tipo Indicador Id Field -->
    <div class="col-md-4">
        <dl class="col-md-12">
            <dt>Tipo:</dt>
            <dd>{!! $grupoValor->tipoIndicador->nombre !!}</dd>
        </dl>
    </div>

    <!-- Estado Field -->
    <div class="col-md-4">
        <dl class="col-md-12">
            <dt>Estado:</dt>
            <dd><label class="label {!! $grupoValor->estado==1?'label-success':'label-danger' !!}">{!! $grupoValor->estado==1?'Activo':'Inactivo' !!}</label></dd>
        </dl>
    </div>

    <!-- Descripcion Field -->
    <div class="col-md-12">
        <dl class="col-md-12">
            <dt>Descripcion:</dt>
            <dd>{!! $grupoValor->descripcion !!}</dd>
        </dl>
    </div>
</div>