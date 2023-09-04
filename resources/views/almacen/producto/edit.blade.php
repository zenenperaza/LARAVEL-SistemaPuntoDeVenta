@extends('layouts.admin')

@section('contenido')
   
<div class="content col-12"> 
  <div class="card card-primary" >
    <div class="card-header">
        <h3 class="card-header">Editar Producto</h3>
    </div>
    <div class="card-body">
      <br>
      <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
      <form action="{{ route('producto.update', $producto->id_producto) }}" method="POST"  enctype="multipart/formem-data" class=" form needs-validation" novalidate>

        @csrf
        @method('PUT')

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nombre">Nmobre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" placeholder="Nombre Producto">
            </div>
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="id_categoria">Categoria</label>
                <select class="form-control" id="id_categoria" name="id_categoria">
                  @foreach ($categorias as $cat)
                    @if ($cat->id_categoria == $producto->id_categoria)
                    <option value="{{ $cat->id_categoria }}">{{ $cat->categoria }}</option>                     
                    @else
                    <option value="{{ $cat->id_categoria }}">{{ $cat->categoria }}</option>  
                    @endif                                         
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="codigo">Codigo</label>
              <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $producto->codigo }}">
            </div>
            <div class="form-group col-md-6">
              <label for="stock">Stock</label>
              <input type="number" class="form-control" id="stock" name="stock"  value="{{ $producto->stock }}">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="descripcion">Descripcion</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion"  value="{{ $producto->descripcion }}">
            </div>
          </div>

         
            <div class="form-group col-md-12">                
              <label for="">Imagen</label>
              <div class="custom-file">                  
                <input type="file" class="custom-file-input" id="imagen" name="imagen" required>
                <label class="custom-file-label" for="imagen">Seleccione...</label>
              </div>
              @if (($producto->imagen) != "")
                  <img src="{{ asset('imagenes/productos/'.$producto->imagen) }}" alt="" height="100px" width="100px">
              @endif
            </div>
            
          </div>

          <button type="submit" class="btn btn-primary">Guardar</button>          
      </form>
    </div>
  </div>    
</div>
@endsection