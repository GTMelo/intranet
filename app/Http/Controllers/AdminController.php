<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index(){
        return view('admin.index');
    }

    public function flagList(){
        $flags = Flag::all();
        return view('admin.flaglist', compact('flags'));
    }

}
