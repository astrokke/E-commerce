<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalutController extends Controller
{
   public function index() {
 return view( 'salut');
   }
}
