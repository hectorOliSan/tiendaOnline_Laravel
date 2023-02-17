@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Actualizar producto
  </div>
  <div class="card-body">

    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.product.update', ['id' => $viewData['product']['id']]) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name"  type="text" class="form-control" value="{{$viewData['product']['name']}}">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" type="number" step="0.01" class="form-control" value="{{$viewData['product']['price']}}">
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
        <label class="form-label">Especificaciones</label>
        <input name="especificaciones" type="file" class="form-control" accept="*/*">
      </div>
      <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea class="form-control" name="description" rows="3">{{$viewData['product']['description']}}</textarea>
      </div>
      <button type="submit" class="mt-5 btn btn-primary d-block mx-auto col-4">Editar</button>
    </form>
  </div>
  <div class="card-body text-center">
    <a href="{{route('admin.product.index')}}" class="btn bg-secondary text-white col-4">Volver</a>
  </div>
</div>
@endsection