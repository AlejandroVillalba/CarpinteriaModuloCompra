@extends('layout')

@section('content')
<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>

        <p class="card-text">
          Un ejemplo de texto rapido para construir en el cuadro de título y enmarcar el área de contenido del texto.
        </p>

        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>

    <div class="card card-primary card-outline">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>

        <p class="card-text">
          Algún texto de ejemplo rápido para construir sobre el título de la tarjeta y formar la mayor parte de la tarjeta
          contenido.
        </p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div><!-- /.card -->
  </div>
  <!-- /.col-md-6 -->
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <h5 class="m-0">Featured</h5>
      </div>
      <div class="card-body">
        <h6 class="card-title">Special title treatment</h6>

        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>

    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Featured</h5>
      </div>
      <div class="card-body">
        <h6 class="card-title">Special title treatment</h6>

        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <!-- /.col-md-6 -->
</div>
<!-- /.row -->
@endsection
