<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Proveedor;

class PDFController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
      public function PDFProveedor()
      {
          $proveedor = Proveedor::all();
          $pfd = PDF::loadView('proveedor', compact('proveedor'));
          return $pfd->stream('proveedor.pdf');
      }


}
