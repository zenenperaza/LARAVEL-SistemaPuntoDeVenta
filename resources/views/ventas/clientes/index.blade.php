@extends ('layouts.admin')
@section ('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">LISTADO DE CLIENTES</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Clientes</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Hoverable rows start -->
<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-xl-12">
                        <form action="{{ route('clientes.index') }}" method="get">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-6">
                                         <input type="text" class="form-control" name="texto" placeholder="Buscar clientes" value="{{$texto}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-6">
                                        <a href="{{ route('clientes.create') }}" class="btn btn-success">Nueva</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Tipo documento</th>
                                    <th>Numero documento</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>E-Mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cli)
                                <tr>
                                    <td>
                                        <a href="{{ route('clientes.edit', $cli->id_persona) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                        <!-- Button trigger for danger theme modal -->
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $cli->id_persona }}"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                    <td>{{ $cli->id_persona}}</td>
                                    <td>{{ $cli->nombre}}</td>
                                    <td>{{ $cli->tipo_documento}}</td>
                                    <td>{{ $cli->num_documento}}</td>
                                    <td>{{ $cli->direccion}}</td>
                                    <td>{{ $cli->telefono}}</td>
                                    <td>{{ $cli->email}}</td>

                                </tr>
                                @include('ventas.clientes.modal')
                                @endforeach
                            </tbody>
                        </table>
                        {{ $clientes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection