<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Proveedor;

class PDFController extends Controller
{

      public function PDFProveedor()
      {
          $proveedor = Proveedor::all();
          $pfd = PDF::loadView('proveedor', compact('proveedor'));
          return $pfd->stream('proveedor.pdf');
      }


}
