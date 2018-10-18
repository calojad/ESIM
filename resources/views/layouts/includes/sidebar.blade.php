<aside class="main-sidebar" >
        <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
            <div class="user-panel" align="center">
                <div class="image2">
                    {{--<img src="http://infyom.com/images/logo/blue_logo_150x150.jpg" class="img-circle"alt="User Image"/>--}}
                    <img src="{{asset('images/Logo/LogoUCACUE.jpg')}}" alt="Logo Ucace" height="120">
                </div>
                {{--<div class="pull-left info">
                    @if (Auth::guest())
                    <p>InfyOm</p>
                    @else
                        <p>{{ Auth::user()->name}}</p>
                    @endif
                    <!-- Status -->
                    <a href="#"><i class="fas fa-circle text-success"></i> Online</a>
                </div>--}}
            </div>
            <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
          <span class="input-group-btn">
            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
            </div>
        </form>--}}
        <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                @include('layouts.includes.menu')
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    {{--</div>--}}
</aside>