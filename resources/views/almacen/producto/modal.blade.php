

    <div class="modal fade" id="modal-delete-{{ $prod->id_producto }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('producto.destroy', $prod->id_producto ) }}" method="POST" class="form">
            @csrf
            @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar producto </h1>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
         
            <p>Deseas eliminar la producto <strong>{{ $prod->nombre }}</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Eliminar</button>
        </div>
      </div>
    </form>
    </div>
  </div>