<!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
<!--header start-->
<header class="header black-bg">
    
    <!--logo start-->
    <a href="/" class="logo"><b>Accurc<span>ed</span></b></a>
    <!--logo end-->
    
    <div class="top-menu">
        <ul class="nav pull-right top-menu btn-group" style="margin-top: 12px;">
            @guest
                <li><a class="btn" type="button" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Accede</a></li>
                <li><a class="btn btn-theme" type="button" style="color: white;" href="{{ route('register') }}">Registrate</a></li>
            @endguest
            
            @auth
                <button class="btn btn-theme dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{auth()->user()->nombre}} <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <li> <b> Rol: 
                        @if (auth()->user()->rol == 'ambos' || auth()->user()->rol == 'responsable')
                            Responsable
                        @endif
                        @if (auth()->user()->rol == 'instructor')
                            Instructor
                        @endif
                        @if (auth()->user()->rol == 'consejo')
                            Consejero Divisional
                        @endif
                        @if (auth()->user()->rol == 'director')
                            Director de Division
                        @endif
                        @if (auth()->user()->rol == 'alumno' && auth()->user()->admin == 0)
                            Alumno
                        @endif
                        @if (auth()->user()->admin && auth()->user()->admin == 1)
                            Administrador
                        @endif
                    </b> </li>
                    <li class="divider"></li>
                    @if (auth()->user()->rol == 'consejo')
                        
                    @endif
                    <form id = 'cerrarSesionForm' action="{{ route('cerrarSesion') }}" method="POST">
                        @csrf
                        <a class="btn btn-default btn-block" onclick="cerrarSesionForm.submit();" > <i class="fa fa-power-off"></i> Cerrar sesión</a>
                    </form>
                </ul>
            @endauth
            
        </ul>
    </div>
</header>
<!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
<!--sidebar start-->
@auth
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                    <li class="mt">
                            <a class="active" href="{{route('cursosInscrito')}}">
                                <i class="fa fa-plus-square-o"></i><span>Tus cursos</span>
                            </a>
                        </li>
                    
                {{-- @if ( Auth::ProgramadorCurso()->rol != "instructor" )
                    <li class="mt">
                        <a class="active" href="#">
                            <i class="fa fa-plus-square-o"></i><span>Crear Nuevo curso</span>
                        </a>
                    </li>
                    <li class="mt">
                        <a class="active" href="#">
                            <i class="fa fa-share"></i><span>Mis Propuestas</span>
                        </a>
                    </li>
                @endif
                @if ( Auth::guard('programador')->user() )
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-th"></i><span>Mis Cursos</span>
                        </a>
                        <ul class="sub">
                            <li><a href="">General</a></li>
                            <li><a href="">Buttons</a></li>
                            <li><a href="">Panels</a></li>
                            <li><a href="">Font Awesome</a></li>
                        </ul>
                    </li>
                @endif
                @if ( Auth::Usuario() )
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-th"></i><span>Mis Cursos</span>
                        </a>
                        <ul class="sub">
                            <li><a href="">General</a></li>
                            <li><a href="">Buttons</a></li>
                            <li><a href="">Panels</a></li>
                            <li><a href="">Font Awesome</a></li>
                        </ul>
                    </li>
                @endif --}}

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
@endauth

    <!--sidebar end-->
<!--header end-->