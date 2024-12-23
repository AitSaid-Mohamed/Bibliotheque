<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class AdministrateurController extends Controller
{
      public function index()
    {
        $admin = Admin::all(); 
        return response()->json($admin); 
    }
}
