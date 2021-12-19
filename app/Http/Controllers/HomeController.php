<?php

namespace App\Http\Controllers;


use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;
use function PHPUnit\Framework\containsIdentical;
use function Symfony\Component\String\lower;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $food=Food::all();
        return view('home')->with('data',$food)->with('all',1);
    }
    public function search(){
       $data = Food::all()->where('name',request('search'));
        return view('home')->with('search',$data);
    }
    public function indexQ($type)
    {
        if ($type=='food'){

            $food = Food::all()->where('type','food');
            return view('home')->with('data',$food)->with('food',1);
        }
        if ($type=='drink'){

            $food = Food::all()->where('type','drink');
            return view('home')->with('data',$food)->with('drink',1);
        }
    }
    public function adminView(){
        if (auth()->user()->role!='admin'){
            return abort(404);
        }else{
            return view('admin');
        }
    }
    public function adminOrders(){
        return view('AdminOrders');
    }

}
