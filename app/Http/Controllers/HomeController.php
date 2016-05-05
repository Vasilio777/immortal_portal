<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        return view('new_app.new_auth');
//        return view('auth');
    }
//    public function create()
//    public function store(Request $request)
//    public function show($id)
//    public function edit($id)
//    public function update(Request $request, $id)
//    public function destroy($id)
}
