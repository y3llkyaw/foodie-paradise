<?php

namespace App\Http\Controllers;

use App\Models\OrderList;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use function Symfony\Component\String\toString;

class OrderController extends Controller
{
    public function add($user){
        $user = User::findOrFail($user);

            if (request('q1')==null){
                return redirect('home')->with('danger','Order Failed.');
            }

        $order = Orders::create([
            'ph'=>request('phone'),
            'address'=>request('address'),
            'user_id'=>$user->id,
            'note'=>request('note'),
        ]);

        $i = request('bnumb');
        for ($i;$i>0;$i--){

            OrderList::create([
                'q'=>request('q'.$i),
                'food_id'=>request('id'.$i),
                'orders_id'=>$order['id'],
            ]);
        }
        return redirect('home')->with('success','Your Orders are Completed.');
    }

    public function delete($id){
        if (auth()->user()->role!='admin'){
            return abort(404);
        }else{
            $order = Orders::findOrFail($id);
            $order->delete();
            return redirect('/admin/orders')->with('success','You Successfully Deleted Order.');
        }

    }
}
