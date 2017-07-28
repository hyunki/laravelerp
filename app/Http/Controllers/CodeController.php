<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Code as Code;

class CodeController extends Controller
{
    public function index()
    {
        return view('code.list');
    }

    public function create()
    {
    	return view('code.create');
    }

    public function fetch()
    {
    	
    }
}
