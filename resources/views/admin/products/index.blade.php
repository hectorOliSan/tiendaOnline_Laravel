@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Crear productos
  </div>
  <div class="card-body">

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name"  type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" type="number" step="any" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Imagen:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="image" type="file" class="form-control" accept="image/*">
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Panel de control de productos
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        @foreach($viewData['products'] as $clave => $valor)
          <tr>
            <td>{{ $valor['id'] }}</td>
            <td>{{ $valor['name'] }}</td>
            <td>
              <form method="GET" action="{{ route('admin.product.edit', ['id' => $valor["id"]]) }}">
								<button class='btn btn-primary' type='submit'>
									<i class="bi bi-pencil-square"></i>
								</button>
							</form>
            </td>
            <td>
              <form method="POST" action="{{ route('admin.product.delete', ['id' => $valor["id"]]) }}">
								@csrf
								@method('DELETE')
								<button class='btn btn-danger' type='submit' onclick="return confirm('¿Seguro que quieres borrar el producto?')">
										<i class="bi bi-trash"></i>
								</button>
							</form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
