@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">ADMINISTRADOR DE USUARIOS REGISTRADOS ONLINE</h1>
    <hr>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('registro.create')}}" class="btn btn-primary"><i class="icofont-plus"></i>
                    Agregar nuevo
                </a>
                <button type="button" class="btn btn-danger mx-2"
                        data-toggle="modal"
                        data-target="#deleteModalAll">
                    <i class="icofont-delete"></i>
                    Eliminar todos
                </button>
            </div>
        </div>
    </div>



    <div class="container-fluid mt-4">

        {{-- TABLA DE CONTENIDO --}}
        @if (session('status'))
            <div class="alert alert-info">{{session('status')}}</div>
        @endif

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-hover bg table-striped">
                    <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">
                            Opciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (!$model->isEmpty())
                        @php
                            $cont =1;
                        @endphp
                        @foreach ($model as $item)

                            <tr>
                                <th scope="row">{{$cont++}}</th>
                                <td>{{$item->nombres}}</td>
                                <td>{{$item->apellidos}}</td>
                                <td>{{$item->correo}}</td>
                                <td>{{$item->empresa}}</td>
                                <td>
                                    <a data-toggle="tooltip" data-placement="top"
                                       title="Editar usuario: {{$item->nombre}}" href="{{route('registro.edit',$item)}}"
                                       class="btn btn-warning btn-sm">
                                        <i class="icofont-edit"></i>
                                    </a>

                                    <button type="button" class="btn btn-danger btn-sm btn-delete-click mx-2"
                                            data-toggle="modal"
                                            data-target="#deleteModal" data-id="{{$item->id}}">
                                        <i class="icofont-delete"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        {{-- EN CASO DE QUE NO EXISTAN REGISTROS  --}}
                    @else
                        <tr>
                            <td colspan='8' class="border">No existen registros.</td>
                        </tr>
                    @endif
                    {{-- FIN DE EN CASO DE QUE NO EXISTAN REGISTROS  --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="document.getElementById('frm-delete').submit();"
                            class="btn btn-danger" id="btn-delete">
                        Eliminar
                    </button>
                    <form id="frm-delete" action="" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModalAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar todos los registros?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('registro.destroyall')}}" onclick="document.getElementById('frm-delete').submit();"
                            class="btn btn-danger" id="btn-delete">
                        Eliminar
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- FIN DE LA TABLA DE CONTENIDO --}}

@endsection

@section('script')
    <script type="text/javascript" defer>
        $(document).ready(function () {
            $(document).on('click', '.btn-delete-click', function () {
                var url = "{{route('registro.destroy','xxx')}}";
                var id = $(this).data('id');
                var url_self = url.replace('xxx', id);
                $('#frm-delete').attr('action', url_self);
                //console.log(url, url_self);
            });
        })
    </script>
@endsection