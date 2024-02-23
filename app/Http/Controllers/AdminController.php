<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Não incluí o middleware porque já está implícito na rota
    // public function __construct() {
    //     $this->middleware(['auth']);
    // }

    public function index() {
        return view('admin.index');
    }
}
