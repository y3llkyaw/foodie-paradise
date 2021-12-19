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
        <a class="btn btn-success btn-success me-1 disabled" href="/admin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
            </svg></a>
        <a class="btn btn-success btn-success me-1" href="/foods/create">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            Foods</a>
        <a class="btn btn-success btn-success me-1" href="/admin/orders">Orders</a>

    </div>

    <hr>

    <div class="row m-2">
        @foreach(\App\Models\Food::all() as $food)
           <div class="col-md-3">
                <div class="card mb-4 box-shadow shadow">
                    <img class="card-img-top" alt="" style="height: 100%; width: 100%; display: block;" src="/storage/{{$food->image}}" data-holder-rendered="true">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <a name="edit" class="btn btn-danger btn-sm" href="/foods/edit/{{$food->id}}">
                                edit
                            </a>
                            <form action="/foods/delete/{{$food->id}}" method="POST">
                                @csrf
                                <button type="submit" name="delete" class="btn btn-danger btn-sm m-1">
                                    delete
                                </button>
                            </form>
                            <br>
                            <small class="brand m-1"><b>{{$food->name}}</b></small>
                            <small class=""><b><span class="text-success">Price:</span> ${{$food->price}} </b></small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endsection

