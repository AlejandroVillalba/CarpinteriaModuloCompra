<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reporte Proveedor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <h1 align="center">Reporte Proveedor</h1>
    </header>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Empresa</th>
            <th scope="col">Ruc</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
    <tbody>
          @foreach($proveedor as $pro)
          <tr>
            <td>{{$pro->nombreEmpresa}}</td>
            <td>{{$pro->ruc}}</td>
            <td>{{$pro->direccion}}</td>
            <td>{{$pro->telefono}}</td>
            <td>{{$pro->email}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </body>
</html>
