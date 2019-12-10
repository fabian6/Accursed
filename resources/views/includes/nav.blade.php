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
                    @if (auth()->user()->rol == 'instructor' || auth()->user()->rol == 'responsable' || auth()->user()->rol == 'ambos')
                        <form  method="POST" action="{{ route('logoutPro') }}">
                            @csrf
                            <button class="btn btn-default btn-block" type="submit"> <i class="fa fa-power-off"></i> Cerrar sesión</button>
                        </form>
                    @else
                        <form id = 'cerrarSesionForm' action="{{ route('cerrarSesion') }}" method="POST">
                            @csrf
                            <a class="btn btn-default btn-block" onclick="cerrarSesionForm.submit();" > <i class="fa fa-power-off"></i> Cerrar sesión</a>
                        </form>
                    @endif

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
                @if (auth()->user()->rol == 'alumno')
                    <li class="mt">
                        <a class="active" href="{{route('cursosInscrito')}}">
                            <i class="fa fa-plus-square-o"></i><span>Tus cursos</span>
                        </a>
                    </li>
                @endif

                @if ( auth()->user()->rol == "responsable" || auth()->user()->rol == "ambos" )
                    <li class="">
                        <a class="" href="crear-curso">
                            <i class="fa fa-plus-square-o"></i><span>Crear Nuevo curso</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="#">
                            <i class="fa fa-share"></i><span>Mis Propuestas</span>
                        </a>
                    </li>
                @endif
                @if ( auth()->user()->rol == "responsable" || auth()->user()->rol == "ambos" || auth()->user()->rol == "instructor" )
                    <li class="sub-menu">
                        <a class="active" href="javascript:;">
                            <i class="fa fa-th"></i><span>Mis Cursos</span>
                        </a>
                        <ul class="sub">
                            @if ($cursosProgramador->count()>0)
                                @foreach ($cursosProgramador as $curso)
                                    @if ($curso->estado == "Aprobado")
                                        <li>
                                            <form action="{{route('enviar-evaluacion-alumno')}}" method="GET">
                                                <input type="hidden" name="curso" value="{{$curso->id}}">
                                                <button type="submit"><i class="fa fa-book">{{$curso->nombre}}</i><span class="label label-success">Aprobada</span></button>
                                            </form>
                                        </li>
                                    @else
                                        
                                    @endif
                                    
                                @endforeach
                            @else

                            @endif
                            
                            
                        </ul>
                    </li>
                @endif
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
@endauth

    <!--sidebar end-->
<!--header end-->