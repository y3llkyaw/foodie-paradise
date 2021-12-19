<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\isEmpty;

class FoodController extends Controller
{
    public function createFoods()
    {
        if (auth()->user()->role!='admin'){
            return abort(404);
        }else{
            return view('createFoods');
        }
    }
    public function storeFoods(){
        if (auth()->user()->role!='admin'){
            return abort(404);
        }else{

            $data = request()->validate([

                'name'=> 'required',
                'price'=>'required',
                'image'=>['required','image'],
                'type'=>'required',
                'detail'=> '',
                'options'=> '',

            ]);

            $data['image'] = request('image')->store('uploads','public');
//        dd($data['image']);
            $img=Image::make(public_path("storage/{$data['image']}"))->fit(1200,1200);
            $img->save();

            Food::create([
                'name'=> $data['name'],
                'price'=>$data['price'],
                'type'=>$data['type'],
                'detail'=>$data['detail'],
                'image'=>$data['image'],
            ]);
//        Food::create($data);
            return redirect('/admin');

        }
    }
    public function editFoods($food){
        if (auth()->user()->role!='admin'){
            return abort(404);
        }else{
            $food = Food::findOrFail($food);
            return view('editFoods')->with('data',$food);
        }

    }

    public function update($food){

        if (auth()->user()->role!='admin'){
            return abort(404);
        }else{
            $food = Food::findOrFail($food);
            $data = request()->validate([
                'name'=> 'required',
                'price'=>'required',
                'image'=>['image'],
                'type'=>'required',
                'detail'=> '',
                'options'=> '',
            ]);
            if(request('image')==null){
                $food->update($data);
                return redirect('/admin')->with('success',"Successfully updated ".$food->name);
            }
            else{
                $data['image']=request('image')->store('uploads','public');
                $image=Image::make(public_path("storage/{$data['image']}"))->fit(1200,1200);
                $image->save();

                $food->update($data);
                return redirect('/admin')->with('success',"Successfully updated ".$food->name);
            }
        }

    }
    public function delete($food){
        if (auth()->user()->role!='admin'){
            return abort(404);
        }else{
            $food = Food::findOrFail($food);
            $food->delete();
            return redirect('/admin')->with('success',"You Successfully Deleted ".$food->name);
        }


    }
}
