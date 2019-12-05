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
                <li><a class="btn" type="button" href="#"><i class="fa fa-sign-in"></i> Accede</a></li>
                <li><a class="btn btn-theme" type="button" style="color: white;" href="#">Registrate</a></li>
            @endguest
            
            @auth
                <button class="btn btn-theme dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {nombre} <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <li>Rol: </li>
                    <li class="divider"></li>
                    <li> <a href="#"> <i class="fa fa-power-off"></i>Salir</a> </li>
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
                @if ( Auth::ProgramadorCurso()->rol != "instructor" )
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
                @if ( Auth::ProgramadorCurso() )
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
                @endif

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
@endauth

    <!--sidebar end-->
<!--header end-->