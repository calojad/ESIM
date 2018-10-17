<li class="treeview {{ Request::is('ubicacions*','tipoUnidads*','tipoPeriodos*','tipoEvaluacions*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-desktop  font-14pt"></i> <span>1.- Mantenimientos</span>
        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('tipoEvaluacions*') ? 'active' : '' }}">
            <a href="{!! route('tipoEvaluacions.index') !!}"><i class="{{ Request::is('tipoEvaluacions*') ? 'fas' : 'far' }} fa-circle"></i>Tipo Evaluacions</a>
        </li>
        <li class="{{ Request::is('tipoPeriodos*') ? 'active' : '' }}">
            <a href="{!! route('tipoPeriodos.index') !!}"><i class="{{ Request::is('tipoPeriodos*') ? 'fas' : 'far' }} fa-circle"></i>Tipo Periodo</a></li>
        <li class="{{ Request::is('tipoUnidads*') ? 'active' : '' }}">
            <a href="{!! route('tipoUnidads.index') !!}"><i class="{{ Request::is('tipoUnidads*') ? 'fas' : 'far' }} fa-circle"></i>Tipo Unidad</a></li>  
        <li class="{{ Request::is('ubicacions*') ? 'active' : '' }}"><a href="{!! route('ubicacions.index') !!}"><i class="{{ Request::is('ubicacions*') ? 'fas' : 'far' }} fa-circle"></i>Ubicaciones</a></li>
    </ul>
</li>
<li class="treeview {{ Request::is('periodos*','unidads*','carreras*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-book-reader font-14pt"></i> <span>2.- I.E.S.</span>
        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('periodos*') ? 'active' : '' }}">
            <a href="{!! route('periodos.index') !!}"><i class="{{ Request::is('periodos*') ? 'fas' : 'far' }} fa-circle"></i>Periodos</a>
        </li>
        <li class="{{ Request::is('unidads*') ? 'active' : '' }}">
            <a href="{!! route('unidads.index') !!}"><i class="{{ Request::is('unidads*') ? 'fas' : 'far' }} fa-circle"></i>Unidades</a>
        </li>
        <li class="{{ Request::is('carreras*') ? 'active' : '' }}">
            <a href="{!! route('carreras.index') !!}"><i class="{{ Request::is('carreras*') ? 'fas' : 'far' }} fa-circle"></i>Carreras</a>
        </li>
        <li><a href="#"><i class="far fa-circle"></i>Usuarios</a></li>
    </ul>
</li>
<li class="treeview {{ Request::is('calculos*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-calculator font-14pt"></i> <span>3.- Cálculo</span>
        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="#"><i class="far fa-circle"></i>Cualitativos</a></li>
        <li><a href="#"><i class="far fa-circle"></i>Cuantitativos</a></li>
    </ul>
</li>
<li class="treeview {{ Request::is('matriz*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-table font-14pt"></i> <span>4.- Matriz</span>
        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="#"><i class="far fa-circle"></i>Modelos</a></li>
        <li><a href="#"><i class="far fa-circle"></i>Estructuras</a></li>
        <li><a href="#"><i class="far fa-circle"></i>Matrices</a></li>
    </ul>
</li>
<li class="treeview {{ Request::is('ponderacions*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-balance-scale font-14pt"></i> <span>5.- Ponderación</span>
        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="#"><i class="far fa-circle"></i>Pesos Criterios</a></li>
        <li><a href="#"><i class="far fa-circle"></i>Pesos Indicadores</a></li>
    </ul>
</li>