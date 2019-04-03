@if(Auth::user()->rol == 1)
<li class="header" style="font-size: 12pt">Mantenimientos</li>

{{-- ********* SISTEMA ********* --}}
<li class="treeview {{ Request::is('ubicacions*','tipoUnidads*','tipoPeriodos*','tipoEvaluacions*','tipoIndicadors*','tipoMatrizs*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-desktop  font-14pt"></i> <span>Sistema</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('tipoEvaluacions*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('tipoEvaluacions.index') !!}"><i class="{{ Request::is('tipoEvaluacions*') ? 'fas' : 'far' }} fa-circle"></i><span>Tipo Evaluacions</span></a>
        </li>
        <li class="{{ Request::is('tipoIndicadors*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('tipoIndicadors.index') !!}"><i class="{{ Request::is('tipoIndicadors*') ? 'fas' : 'far' }} fa-circle"></i><span>Tipo Indicador</span></a>
        </li>

        <li class="{{ Request::is('tipoMatrizs*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('tipoMatrizs.index') !!}"><i class="{{ Request::is('tipoMatrizs*') ? 'fas' : 'far' }} fa-circle"></i><span>Tipo Matrizs</span></a>
        </li>

        <li class="{{ Request::is('tipoPeriodos*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('tipoPeriodos.index') !!}"><i class="{{ Request::is('tipoPeriodos*') ? 'fas' : 'far' }} fa-circle"></i><span>Tipo Periodo</span></a>
        </li>
        <li class="{{ Request::is('tipoUnidads*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('tipoUnidads.index') !!}"><i class="{{ Request::is('tipoUnidads*') ? 'fas' : 'far' }} fa-circle"></i><span>Tipo Unidad</span></a>
        </li>
        <li class="{{ Request::is('ubicacions*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('ubicacions.index') !!}"><i class="{{ Request::is('ubicacions*') ? 'fas' : 'far' }} fa-circle"></i><span>Ubicaciones</span></a>
        </li>
    </ul>
</li>

{{-- ********* IES ********* --}}
<li class="treeview {{ Request::is('periodos*','unidads*','carreras*','users*','departamentos*','responsables*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-book-reader font-14pt"></i> <span>I.E.S.</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('carreras*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('carreras.index') !!}"><i class="{{ Request::is('carreras*') ? 'fas' : 'far' }} fa-circle"></i><span>Carreras</span></a>
        </li>
        <li class="{{ Request::is('departamentos*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('departamentos.index') !!}"><i class="{{ Request::is('departamentos*') ? 'fas' : 'far' }} fa-circle"></i><span>Departamentos</span></a>
        </li>
        <li class="{{ Request::is('periodos*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('periodos.index') !!}"><i class="{{ Request::is('periodos*') ? 'fas' : 'far' }} fa-circle"></i><span>Periodos</span></a>
        </li>
        <li class="{{ Request::is('responsables*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('responsables.index') !!}"><i class="{{ Request::is('responsables*') ? 'fas' : 'far' }} fa-circle"></i><span>Responsables</span></a>
        </li>
        <li class="{{ Request::is('unidads*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('unidads.index') !!}"><i class="{{ Request::is('unidads*') ? 'fas' : 'far' }} fa-circle"></i><span>Unidades</span></a>
        </li>
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('users.index') !!}"><i class="{{ Request::is('users*') ? 'fas' : 'far' }} fa-circle"></i><span>Usuarios</span></a>
        </li>
    </ul>
</li>

{{-- ********* CALCULOS ********* --}}
<li class="treeview {{ Request::is('grupoValors*','valoracions*','formulas*','variables*','cuantitativos*','formulaVariables*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-calculator font-14pt"></i> <span>Cálculo</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('grupoValors*','valoracions*') ? 'active' : '' }}">
            <a class="btnLoader" href="{{ route('grupoValors.index') }}"><i class="{{ Request::is('grupoValors*','valoracions*') ? 'fas' : 'far' }} fa-circle"></i><span>Cualitativos</span></a>
        </li>
        <li class="{{ Request::is('formulas*','variables*','cuantitativos*','formulaVariables*') ? 'active' : '' }}">
            <a class="btnLoader" href="{{ URL::to('cuantitativos') }}"><i class="{{ Request::is('formulas*','variables*','cuantitativos*','formulaVariables*') ? 'fas' : 'far' }} fa-circle"></i><span>Cuantitativos</span></a>
        </li>
    </ul>
</li>

{{-- ********* MATRIZ ********* --}}
<li class="treeview {{ Request::is('matriz*','modelos*','criterios*','indicadors*','evidencias*','elementos*','estructura*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-table font-14pt"></i> <span>Matriz</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('criterios*') ? 'active' : '' }}">
            <a href="{!! route('criterios.index') !!}"><i class="{{ Request::is('criterios*') ? 'fas' : 'far' }} fa-circle"></i><span>Criterios</span></a>
        </li>
        <li class="{{ Request::is('indicadors*') ? 'active' : '' }}">
            <a href="{!! route('indicadors.index') !!}"><i class="{{ Request::is('indicadors*') ? 'fas' : 'far' }} fa-circle"></i><span>Indicadores</span></a>
        </li>
        <li class="{{ Request::is('evidencias*') ? 'active' : '' }}">
            <a href="{!! route('evidencias.index') !!}"><i class="{{ Request::is('evidencias*') ? 'fas' : 'far' }} fa-circle"></i><span>Evidencias</span></a>
        </li>
        <li class="{{ Request::is('elementos*') ? 'active' : '' }}">
            <a href="{!! route('elementos.index') !!}"><i class="{{ Request::is('elementos*') ? 'fas' : 'far' }} fa-circle"></i><span>Elementos</span></a>
        </li>
        <hr style="margin: 7px 3px;">
        <li class="{{ Request::is('modelos*','estructura*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('modelos.index') !!}"><i class="{{ Request::is('modelos*','estructura*') ? 'fas' : 'far' }} fa-circle"></i><span>Modelos</span></a>
        </li>

        <li class="{{ Request::is('matrizs*') ? 'active' : '' }}">
            <a class="btnLoader" href="{!! route('matrizs.index') !!}"><i class="{{ Request::is('matrizs*') ? 'fas' : 'far' }} fa-circle"></i><span>Matriz</span></a>
        </li>
    </ul>
</li>

{{-- ********* PONDERACION ********* --}}
<li class="treeview {{ Request::is('ponderacions*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-balance-scale font-14pt"></i> <span>Ponderación</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="#"><i class="far fa-circle"></i>Pesos Criterios</a></li>
        <li><a href="#"><i class="far fa-circle"></i>Pesos Indicadores</a></li>
    </ul>
</li>

<li class="header" style="font-size: 12pt">Agregaciones</li>

{{-- ********* ********* --}}
<li class="{{ Request::is('usuarioasignacion*') ? 'active' : '' }}">
    <a class="btnLoader" href="{!! route('usuarioasignacion.index') !!}" title="Asignar Carreras a Usuarios"><i class="fa fa-user-tag font-14pt"></i><span>Asignaciones</span></a>
</li>
<li class="{{ Request::is('unidadcarrera*') ? 'active' : '' }}">
    <a class="btnLoader" href="{!! route('unidadcarrera.index') !!}"><i class="fa fa-graduation-cap font-14pt"></i><span>Campus</span></a>
</li>
@else
    <li class="{{ Request::is('unidadcarrera*') ? 'active' : '' }}">
        <a class="btnLoader" href="{!! route('unidadcarrera.index') !!}"><i class="fa fa-graduation-cap font-14pt"></i><span>Campus</span></a>
    </li>
@endif