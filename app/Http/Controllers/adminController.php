<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class adminController extends Controller
{
    public function index(){
        return view('admin.page.dashboard',[
            'title' => 'Admin Dashboard',
        ]);
    }
}
