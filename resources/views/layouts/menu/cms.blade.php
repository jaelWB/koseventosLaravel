<h4 class="text-white text-center mt-5 mb-3">Menú de opciones</h4>

<ul class="nav flex-column menu-lateral px-0 mx-0">
    <li class="nav-item">
        <a class="nav-link text-light" href="{{route('cms')}}"><i class="icofont-home"></i> Inicio</a>
    </li>
     @php
         $data = session('rol');
    @endphp


    @if ($data == 'adm')
        <li class="nav-item">
            <a class="nav-link text-light" href="{{route('evento.index')}}"><i class="icofont-mega-phone"></i> Eventos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="{{route('ciudade.index')}}"><i class="icofont-google-map"></i> Ciudades</a>
        </li>
         <li class="nav-item">
            <a class="nav-link text-light" href="{{route('user.index')}}"><i class="icofont-user-alt-1"></i> Administradores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="{{route('categoria.index')}}"><i class="icofont-layers"></i> Categorías</a>
        </li>
       

    @endif

   
    <li class="nav-item">
        <a class="nav-link text-light" href="{{route('asistencias')}}"><i class="icofont-check-alt"></i> Asitencias</a>
    </li>
     <li class="nav-item">
        <a class="nav-link text-light" href="{{route('reportes')}}"><i class="icofont-page"></i> Reportes</a> 
    </li>


    @if ($data == 'adm')
        <li class="nav-item">
            <hr>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="{{route('cargosestandarizado.index')}}"><i class="icofont-tasks"></i> Cargos estandarizados</a>
        </li>

         {{-- <li class="nav-item">
            <a class="nav-link text-light" href="{{route('micronoticiero.index')}}"><i class="icofont-newspaper"></i> Micronoticieros</a>
        </li> --}}

         <li class="nav-item">
            <a class="nav-link text-light" href="{{route('registro.index')}}"><i class="icofont-users"></i> Clientes en Vivo</a>
        </li>
        

    @endif

   
</ul>   