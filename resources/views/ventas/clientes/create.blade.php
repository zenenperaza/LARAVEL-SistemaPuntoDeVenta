@extends('layouts.admin')

@section('contenido')
   
<div class="content col-6"> 
    <div class="card card-primary" >
        <div class="card-header">
            <h3 class="card-header">Nuevo Cliente</h3>
        </div>
      <div class="card-body">
        <br>
        <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
        <form action="{{ route('clientes.store') }}" method="POST" class="form">
          @csrf
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre"  name="nombre"   >           
          </div>
          <div class="mb-3">
              <label for="tipo_documento">Tipo de documento</label>
              <select class="form-control" id="tipo_documento" name="tipo_documento">             
                <option value="Cedula">Cedula</option>               
                <option value="Pasaporte">Pasaporte</option>     
              </select>
          </div>

          <div class="mb-3">
            <label for="num_documento" class="form-label">Numero de documento</label>
            <input type="text" class="form-control" id="num_documento"  name="num_documento"   >           
          </div>
          
          <div class="mb-3">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion"  name="direccion"   >           
          </div>

          <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono"  name="telefono"   >           
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email"  name="email"   >           
          </div>

          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="reset" class="btn btn-primary">Cancelar</button>
        </form>
      </div>
    </div>
    
  </div>
@endsection