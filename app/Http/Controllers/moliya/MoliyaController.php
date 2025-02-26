<?php

namespace App\Http\Controllers\moliya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MoliyaController extends Controller{
    public function index(){
        return view('moliya.index');
    }
}
