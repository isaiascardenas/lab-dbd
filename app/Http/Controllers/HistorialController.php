<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrdenCompra;


class HistorialController extends Controller
{
  public function index()
  {
    $ordenes = OrdenCompra::where('user_id', request()->user()->id)->orderBy('created_at', 'DESC')->get();

    return view('user.historial.index', compact('ordenes'));
  }
}
