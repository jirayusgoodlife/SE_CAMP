<?php

namespace App\Http\Controllers;

use App\Models\M_titles;
use Illuminate\Http\Request;
class MyController extends Controller
{
    private $myvar = "Hello World!";

    function __construct() //MyController
    {

    }

    public function index(){
        $mtl = new M_titles;
        $result = $mtl->get_all_title();
        //  $result = Db::raw("SELECT * FROM titles");
        print_r($result);
        // return view('home');
    }

    public function store(Request $req){
        $data['myinput'] = $req->input('myinput');
        return view('myroute', $data);
    }
}
