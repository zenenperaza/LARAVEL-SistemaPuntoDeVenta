@extends('layouts.admin')

@section('contenido')
   
<div class="content col-12"> 
    <div class="card card-primary" >
        <div class="card-header">
            <h3 class="card-header">Nuevo Ingreso</h3>
        </div>
      <div class="card-body">
        <form action="{{ route('ingreso.store') }}" method="POST" class="form">
          @csrf
          <div class="row">
          <div class="col-6 mb-3 ">
            <label for="id_proveedor" class="form-label">Proveedor</label>
            <select class="form-control" id="id_proveedor" name="id_proveedor">   
              @foreach ($personas as $persona)
              <option value="{{ $persona->id_persona }}">{{ $persona->nombre }}</option>                 
              @endforeach              
            </select>         
          </div>
          <div class="col-3 mb-3">
              <label for="tipo_documento">Tipo de documento</label>
              <select class="form-control" id="tipo_documento" name="tipo_documento">             
                <option value="Cedula">Cedula</option>               
                <option value="Pasaporte">Pasaporte</option>     
              </select>
          </div>

          <div class="col-3 mb-3">
            <label for="num_documento" class="form-label">Numero de documento</label>
            <input type="text" class="form-control" id="num_documento"  name="num_documento"   >           
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-4">
            <label for="id_producto" class="form-label">Producto</label>
            <select class="form-control selectpicker" id="id_producto" name="id_producto" data-live-search="true">   
              @foreach ($productos as $producto)
              <option value="{{ $producto->id_producto }}">{{ $producto->Articulo }}</option>                 
              @endforeach              
            </select>   
          </div>
          <div class="col-2">            
            <label for="pcantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="pcantidad"  name="pcantidad" min="0"  >    
          </div>
          <div class="col-2">
            <label for="pprecio_compra" class="form-label">P. Compra</label>
            <input type="number" class="form-control" id="pprecio_compra" step="0.01" min="0" name="pprecio_compra"   > 
            
          </div>
          <div class="col-2">            
            <label for="pprecio_venta" class="form-label">P. Venta</label>
            <input type="number" class="form-control" id="pprecio_venta" step="0.01" min="0" name="pprecio_venta"   > 
            
          </div>
          <div class="col-2">            
            <label for="pprecio_compra" class="form-label">Accion</label><br>
           <button type="button" id="bt_add" class="btn btn-success">Add</button>
          </div>
        </div>
          
        <div class="row mb-3">
          <div class="col">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
          </div>
         
        </div>
        </form>
      </div>
    </div>
    
  </div>
@endsection