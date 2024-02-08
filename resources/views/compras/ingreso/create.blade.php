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
            <label for="pidarticulo" class="form-label">Producto</label>
            <select class="form-control selectpicker" id="pidarticulo" name="pidarticulo" data-live-search="true">   
              @foreach ($productos as $producto)
              <option value="{{ $producto->id_producto }}">{{ $producto->Articulo }}</option>                 
              @endforeach              
            </select>   
          </div>
          <div class="col-2">            
            <label for="pcantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="pcantidad"  name="pcantidad" min="1"  >    
          </div>
          <div class="col-2">
            <label for="pprecio_compra" class="form-label">P. Compra</label>
            <input type="number" class="form-control" id="pprecio_compra" step="0.01" min="1" name="pprecio_compra"   > 
            
          </div>
          <div class="col-2">            
            <label for="pprecio_venta" class="form-label">P. Venta</label>
            <input type="number" class="form-control" id="pprecio_venta" step="0.01" min="1" name="pprecio_venta"   > 
            
          </div>
          <div class="col-2">            
            <label for="pprecio_compra" class="form-label">Accion</label><br>
           <button type="button" id="bt_add" class="btn btn-success">Add</button>
          </div>
        </div>

        <div class="table-responsive">
          <table id="detalles" class="table table-hover mb-0">
              <thead>
                  <tr>
                      <th>Opciones</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Precio de compra</th>
                      <th>Precio de venta</th>
                      <th>Sub total</th>
                  </tr>
              </thead>
              <tfoot>
                <th>TOTAL</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th><h4 id="total">$ 0,00</h4></th>
              </tfoot>
              <tbody>
                 
              </tbody>
          </table>
      </div>
          
        <div class="row mb-3">
          {{-- <input type="hidden" name="_token" value="{{ csrf_token }}"> --}}
          <div class="col">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
          </div>
         
        </div>
        </form>
      </div>
    </div>
    
  </div>

@push('script')
<script>

  $(document).ready(function(){
    $('#bt_add').click(function(){
      console.log('hi');
      agregar();
    })
  })

  var cont = 0;
  total = 0;
  subtotal = [];

  $('#guardar').hide();
  $('#pidarticulo').change(mostrarValores);

  function mostrarValores(){ 
    datosArticulo = document.getElementById('pidarticulo').value.split('_');
    $("#pcantidad").val(datosArticulo[1]);
    $("#unidad").html(datosArticulo[2]);

  }

  function agregar(){
    datosArticulo = document.getElementById('pidarticulo').value.split('_');

    idarticulo = datosArticulo[0];
    articulo = $('pidarticulo option:selected').text();
    cantidad = $('#pcantidad').val();
    precio_compra = $('#pprecio_compra').val();
    precio_venta = $('#pprecio_venta').val();

    if(idarticulo != '' && cantidad != '' && cantidad > 0 && precio_compra != '' && precio_venta != ''){
      subtotal[cont] = (cantidad * precio_compra);
      total = total + subtotal[cont];

      var fila = '<tr class= "selected" id="fila' + cont +
       '"><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont +
         ');">X</button></td><td><input type="hidden" name="idarticulo[]" value="' + idarticulo + '" >' + idarticulo +
          '</td><td><input type="number" name="cantidad[]" value="' + cantidad + 
          '"></td><td><input type="number" name="precio_compra[]" value="' + precio_compra +
             '"></td><td><input type="number" name="precio_venta[]" value="' + precio_venta + 
              '"></td><td>' + subtotal[cont] + '</td></tr>';
      cont++;
      limpiar();
      $('#total').html("$ " + total);
      evaluar();
      $('#detalles').append(fila);
    } else {
      alert("Error al ingresar el detalle del ingreso, revise los datos del articulo");
    }
  }

  function limpiar(){
    $("#pcantidad").val("");
    $("#pprecio_compra").val("");
    $("#pprecio_venta").val("");
  } 
  
  function evaluar(){
    if (total > 0) {
      $("#guardar").show();
    } else {      
      $("#guardar").hide();
    }
  }

  function eliminar(index) {
    total = total - subtotal[index];
    $("#total").html("$: " + total);
    $("#fila" + index).remove();
    evaluar();
    
  }


</script>  
@endpush
@endsection