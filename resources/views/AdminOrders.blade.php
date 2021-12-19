@extends('layouts.app')

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div class="container">
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
        <div class="d-flex">
        <a class="btn btn-success btn-success me-1" href="/admin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
            </svg></a>
        <a class="btn btn-success btn-success me-1" href="/foods/create">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            Foods</a>
        <a class="btn btn-success btn-success me-1 disabled" href="/admin/orders">Orders</a>

    </div>
    <hr>

    <div class="row m-2">

        @foreach(\App\Models\Orders::all() as $orders)

            <div class="col-md-6">
                <div class="card mb-4 box-shadow shadow">
                    <div class="card-header">
                        <table class="table m-0">
                            <tr>
                                <th class="text-success">{{$orders->user->name}}</th>
                                <th class="text-success">{{$orders->ph}}</th>
                                <th class="text-success">{{$orders->address}}</th>
                                <th class="text-success"><small>{{$orders->created_at}}</small><br>{{$orders->created_at->diffForHumans()}}</th>
                            </tr>
                        </table>
                    </div>
                    <div class="card-body">
                        <table class="table bg-light rounded m-0">
                            <thead>
                            <tr>
                                <th scope="col">Food's Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders->orderlist as $orderlist)
                                <tr>
                                    <td>{{\App\Models\Food::find($orderlist->food_id)->name}}</td>
                                    <td>{{$orderlist->q}}</td>
                                    <td>{{\App\Models\Food::find($orderlist->food_id)->price}}</td>
                                    <td>{{(int)\App\Models\Food::find($orderlist->food_id)->price*(int)$orderlist->q}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer">
                      <b class="text-success">Note:</b> {{$orders->note}}
                    </div>
                    <div class="card-footer">
                        <form action="/order/delete/{{$orders->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delivered</button>

                        </form>
                    </div>
                </div>



            </div>



        @endforeach
    </div>



@endsection

