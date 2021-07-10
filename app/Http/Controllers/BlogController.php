<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class BlogController extends Controller
{
    public function index(){
        return view('home');
    }
    public function list(){
        $data= Restaurant::all();
        return view('list',['data'=>$data]); 
    }
    function add(Request $req){
        //return $req->input();
        $restro= new Restaurant;
        $restro->name=$req->input('name');
        $restro->email=$req->input('email');
        $restro->address=$req->input('address');
        $restro->save();
        $req->session()->flash('status', 'Restaurant entered successfully!!!');  
        return redirect('list');
    }
    
    function delete($id){
        Restaurant::find($id)->delete();
       // Session::flash('status','Restaurant has successfully deleted!!!');
        return redirect('list');
    }

    function edit($id){
        return Restaurant::find($id);
    }
}

