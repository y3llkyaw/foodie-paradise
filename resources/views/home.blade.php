@extends('layouts.app')

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



    <div class="container">

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('danger'))
            <div class="alert alert-danger">
                {{ Session::get('danger') }}
            </div>
        @endif
            @if (!isset($data))<?php $data=\App\Models\Food::all(); ?> @endif
        <div class="d-flex">
            <a class="btn btn-success btn-success me-1  @if ($data==\App\Models\Food::all())disabled @endif" href="/home"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                </svg></a>
            <a class="btn btn-success btn-success me-1 @if ($data==\App\Models\Food::all()->where('type','drink'))disabled @endif" href="/home/drink">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cup-straw" viewBox="0 0 16 16">
                    <path d="M13.902.334a.5.5 0 0 1-.28.65l-2.254.902-.4 1.927c.376.095.715.215.972.367.228.135.56.396.56.82 0 .046-.004.09-.011.132l-.962 9.068a1.28 1.28 0 0 1-.524.93c-.488.34-1.494.87-3.01.87-1.516 0-2.522-.53-3.01-.87a1.28 1.28 0 0 1-.524-.93L3.51 5.132A.78.78 0 0 1 3.5 5c0-.424.332-.685.56-.82.262-.154.607-.276.99-.372C5.824 3.614 6.867 3.5 8 3.5c.712 0 1.389.045 1.985.127l.464-2.215a.5.5 0 0 1 .303-.356l2.5-1a.5.5 0 0 1 .65.278zM9.768 4.607A13.991 13.991 0 0 0 8 4.5c-1.076 0-2.033.11-2.707.278A3.284 3.284 0 0 0 4.645 5c.146.073.362.15.648.222C5.967 5.39 6.924 5.5 8 5.5c.571 0 1.109-.03 1.588-.085l.18-.808zm.292 1.756C9.445 6.45 8.742 6.5 8 6.5c-1.133 0-2.176-.114-2.95-.308a5.514 5.514 0 0 1-.435-.127l.838 8.03c.013.121.06.186.102.215.357.249 1.168.69 2.438.69 1.27 0 2.081-.441 2.438-.69.042-.029.09-.094.102-.215l.852-8.03a5.517 5.517 0 0 1-.435.127 8.88 8.88 0 0 1-.89.17zM4.467 4.884s.003.002.005.006l-.005-.006zm7.066 0-.005.006c.002-.004.005-.006.005-.006zM11.354 5a3.174 3.174 0 0 0-.604-.21l-.099.445.055-.013c.286-.072.502-.149.648-.222z"/>
                </svg>
            </a>
            <a class="btn btn-success btn-success me-1 @if ($data==\App\Models\Food::all()->where('type','food'))disabled @endif" href="/home/food">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-egg-fried" viewBox="0 0 16 16">
                <path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path d="M13.997 5.17a5 5 0 0 0-8.101-4.09A5 5 0 0 0 1.28 9.342a5 5 0 0 0 8.336 5.109 3.5 3.5 0 0 0 5.201-4.065 3.001 3.001 0 0 0-.822-5.216zm-1-.034a1 1 0 0 0 .668.977 2.001 2.001 0 0 1 .547 3.478 1 1 0 0 0-.341 1.113 2.5 2.5 0 0 1-3.715 2.905 1 1 0 0 0-1.262.152 4 4 0 0 1-6.67-4.087 1 1 0 0 0-.2-1 4 4 0 0 1 3.693-6.61 1 1 0 0 0 .8-.2 4 4 0 0 1 6.48 3.273z"/>
            </svg>
            </a>
            <form action="/search" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group me-1">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" name="search"
                           aria-describedby="search-addon" />
                    <button type="submit" class="btn btn-success">search</button>
                </div>
            </form>


            {{--            <div class="col-md-6 mb-1 ml-1">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        Foods & Drinks--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div id="food" class="carousel slide" data-bs-ride="carousel">--}}
{{--                            <div class="carousel-inner">--}}
{{--                                @foreach(\App\Models\Food::all()->where('type','food') as $food)--}}
{{--                                    <div class="carousel-item @if ($loop->first)active @endif shadow">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <center><img class="rounded w-75 m-1 shadow-sm" style="position: -webkit-sticky; /* Safari */position: sticky;top: 0;" src="/storage/{{$food->image}}"/></center>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <h5 class="pt-2 text-success"><b>{{$food->name}}</b></h5>--}}
{{--                                                <p style="height: 75px; overflow: auto; text-align:justify;">{{$food->detail}}</p>--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <span class="m-1 pt-2"><b><span class="text-success">Price:</span> {{$food->price}}</b></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer">--}}
{{--                        <center>  <button class="btn btn-success btn-sm mr-2" type="button" data-bs-target="#food" data-bs-slide="prev">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">--}}
{{--                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                            <button class="btn btn-success btn-sm ml-2" type="button" data-bs-target="#food" data-bs-slide="next">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">--}}
{{--                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>--}}
{{--                                </svg>--}}
{{--                            </button></center>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}



        </div>
<hr>

            @if (isset($search))
                <div class="alert alert-info">Your Search Result is Here.</div>

                @foreach($search as $food)

                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow shadow">
                            <img class="card-img-top" alt="" style="height: 100%; width: 100%; display: block;" src="/storage/{{$food->image}}" data-holder-rendered="true">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button id="" type="" onclick="add({{$food->id}},'{{$food->name}}',{{$food->price}});" name="add" class="btn btn-success btn-sm btn{{$food->id}}">
                                        <svg id="svg{{$food->id}}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{$food->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed" viewBox="0 0 16 16">
                                            <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5ZM5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z"/>
                                            <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z"/>
                                        </svg>
                                    </button>
                                    <div class="modal fade" id="detail{{$food->id}}" tabindex="" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span class="text-success">{{$food->name}}</span> details.</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img class="card-img-top mb-2" style="position: -webkit-sticky; /* Safari */position: sticky;top: 0;" alt="{{$food->name}}" style="height: 100%; width: 100%; display: block;" src="/uploads/{{$food->image}}" data-holder-rendered="true">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p style="height: 200px; overflow: auto; text-align:justify;">
                                                                {{$food->detail}}
                                                            </p>
                                                            <div class="d-flex">
                                                                <span class="text-success">Price: </span><b>{{$food->price}}</b><small>mmk</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <small class="brand "><b>{{$food->name}}</b></small>
                                    <small class=""><b><span class="text-success">Price:</span> {{$food->price}} </b> mmk</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            <hr>
            @endif
{{--        -------------------------------------------------------------------------------------------}}
{{--    <div class="row border-1">--}}
{{--        <div class="col-md-3 pb-5">--}}
{{--            <center><img class="rounded w-75 m-1 shadow-lg" src="/icons/malashankaw.jpg"/></center>--}}
{{--        </div>--}}
{{--        <div class="col-md-3 p-4">--}}
{{--            <h5><b>Today's Special Menu - {{"Mala Shan Guo"}}</b></h5>--}}
{{--            <p style="text-align: justify;">Mala xiang guo was introduced by the Burmese Chinese people to Myanmar, and is now a popular dish there, where it is called mala shan gaw (မာလာရှမ်းကော).</p>--}}
{{--            <div class="d-flex">--}}
{{--                <a class="btn btn-success btn-sm m-1">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">--}}
{{--                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>--}}
{{--                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>--}}
{{--                    </svg>--}}
{{--                </a>--}}
{{--                <small class="m-1 pt-2"><b><span class="text-success">Price:</span>  $500</b></small>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-md-3 pb-5">--}}
{{--            <center><img class="rounded w-75 m-1 shadow-lg" src="/icons/malashankaw.jpg"/></center>--}}
{{--        </div>--}}


{{--        <div class="col-md-3 p-4">--}}
{{--            <h5><b>Today's Special Menu - {{"Mala Shan Guo"}}</b></h5>--}}
{{--            <p style="text-align: justify;">Mala xiang guo was introduced by the Burmese Chinese people to Myanmar, and is now a popular dish there, where it is called mala shan gaw (မာလာရှမ်းကော).</p>--}}
{{--            <div class="d-flex">--}}
{{--                <a class="btn btn-success btn-sm m-1">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">--}}
{{--                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>--}}
{{--                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>--}}
{{--                    </svg>--}}
{{--                </a>--}}
{{--                <small class="m-1 pt-2"><b><span class="text-success">Price:</span>  $500</b></small>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



{{--    <ul class="nav nav-tabs">--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="/home">All</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link " href="/home/food">  Foods <img src="/icons/foods.jpg" style="width: 20px;"/></a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="/home/drink">  Drinks <img src="/icons/drinks.png" style="width:13px;"/></a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link disabled" href="#">Disabled</a>--}}
{{--        </li>--}}
{{--    </ul>--}}
    <div class="row m-2">

        <script>

            function calculate(id,name,price) {
                var q = $('#input'+id).val();
                var r = q * price;
                document.getElementById('price'+id).innerHTML =r;


                let input = document.getElementById('re'+id);
                input.setAttribute('value',r);

                let inputq = document.getElementById('q'+id);
                inputq.setAttribute('value',q);


            }

            var bnumb=0;

            function add(id,name,price)
            {
                //Showing number to the bottom button
                bnumb +=1;
                document.getElementById("bnumb").innerHTML = bnumb ;

                let inputbnumb = document.getElementById('inputbnumb');
                inputbnumb.setAttribute('value',bnumb);

                var argument = id+","+"'"+name+"',"+price;

                //Changing the button
                $('.btn'+id).attr('class','btn btn-danger btn-sm btn'+id);
                $('.btn'+id).attr('onclick','remove('+argument+')'); // " is really make changes
                document.getElementById("svg"+id).innerHTML = "<path d=\"M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z\"/>\n" +
                    "  <path d=\"M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z\"/>\n" ;

                //Adding Elements to modals
                $('#modal-body').append(`<div class='d-flex' id='cart${id}'><span class='m-1 w-100'>${name}</span> <input id="input${id}" onclick="calculate( ${argument} )" onkeyup="calculate( ${argument} )" class='form-control form-control-sm m-1' type='number' min='1' width='20%' value='1'><span class='m-1' id="price${id}" >${price}</span><input id="q${id}" name="q${bnumb}" value="1" hidden> <input name="id${bnumb}" value="${id}" hidden> <input name="price${bnumb}" value="${price}" hidden> <input id="re${id}" name="total${bnumb}" value="${price}" hidden><a class='link-text link-danger btn-sm' onclick="remove(${argument});">remove</a></div>`);


            }
            function remove(id,name,price)
            {
                //Showing number to the bottom button
                bnumb -=1;
                document.getElementById("bnumb").innerHTML = bnumb ;
                let inputbnumb = document.getElementById('inputbnumb');
                inputbnumb.setAttribute('value',bnumb);

                //Changing the button
                $('.btn'+id).attr('class','btn btn-success btn-sm btn'+id);
                $('.btn'+id).attr('onclick','add('+id+',"'+name+'",'+price+')'); // " is really make changes
                document.getElementById("svg"+id).innerHTML = "<path d=\"M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z\"/>\n" +
                    "                                    <path d=\"M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z\"/>\n";
                //Removing Elements to modals
                $('#cart'+id).remove();
            }

        </script>
        @foreach($data as $food)

        <div class="col-md-3">
            <div class="card mb-4 box-shadow shadow">
                <img class="card-img-top" alt="" style="height: 100%; width: 100%; display: block;" src="/uploads/{{$food->image}}" data-holder-rendered="true">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <button id="" type="" onclick="add({{$food->id}},'{{$food->name}}',{{$food->price}});" name="add" class="btn btn-success btn-sm btn{{$food->id}}">
                            <svg id="svg{{$food->id}}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{$food->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed" viewBox="0 0 16 16">
                                <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5ZM5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z"/>
                                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z"/>
                            </svg>
                        </button>
                        <div class="modal fade" id="detail{{$food->id}}" tabindex="" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><span class="text-success">{{$food->name}}</span> details.</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img class="card-img-top mb-2" style="position: -webkit-sticky; /* Safari */position: sticky;top: 0;" alt="{{$food->name}}" style="height: 100%; width: 100%; display: block;" src="/uploads/{{$food->image}}" data-holder-rendered="true">
                                                </div>
                                                <div class="col-md-6">
                                                    <p style="height: 200px; overflow: auto; text-align:justify;">
                                                        {{$food->detail}}
                                                    </p>
                                                    <div class="d-flex">
                                                        <span class="text-success">Price: </span><b>{{$food->price}}</b><small>mmk</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                        </div>
                        <br>
                        <small class="brand "><b>{{$food->name}}</b></small>
                        <small class=""><b><span class="text-success">Price:</span> {{$food->price}} </b> mmk</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="card" >
            <div class="card-header text-success">
                <b>Your Orders</b>
            </div>
            <div class="card-body" id="orders">
                <table class="table bg-light rounded m-0">
                    <thead>
                    <tr>
                        <th scope="col">Food's Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date & Time</th>
                    </tr>
                    </thead>
                    @foreach(auth()->user()->orders as $orders)
                        @foreach($orders->orderlist as $orderlist)
                            <tr>
                                <td>{{\App\Models\Food::find($orderlist->food_id)->name}}</td>
                                <td>{{$orderlist->q}}</td>
                                <td>{{\App\Models\Food::find($orderlist->food_id)->price}}</td>
                                <td>{{(int)\App\Models\Food::find($orderlist->food_id)->price*(int)$orderlist->q}}</td>
                                <td class="text-success"><small>{{$orders->created_at}}</small><br>{{$orders->created_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach

                    @endforeach
                </table>
            </div>
        </div>

    </div>
</div>

<button type="button" class="btn btn-info fixed-bottom" data-bs-toggle="modal" data-bs-target="#order" style=" margin:0 0 60px 5px; ">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
    </svg>
    <span class="badge badge-light mt-2" style="margin: 0 0 0 0; padding: 0 0 0 0;">
    <p id="bnumb" style="margin: 0 0 0 0;"></p>
    </span>
</button>
<div class="modal fade" id="order" tabindex="" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <form method="POST" action="/order/{{auth()->user()->id}}" enctype="multipart/form-data">
     @csrf
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Your Order List</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <input name="bnumb" id="inputbnumb" value="0" hidden>
                 <div class="row" id="modal-body">

                 </div>
                 @error('address'|'phone'|'q1')
                 <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                 @enderror
             </div>
             <div class="modal-footer d-block">
                 <div class="d-flex m-2">
                     <span class="m-1 w-50">Phone</span><input type="number" class="form-control form-control-sm" name="phone" value="{{auth()->user()->phone}}">
                 </div>
                 <div class="d-flex m-2">
                     <span class="m-1 w-50">Address</span><input type="text" class="form-control form-control-sm" name="address" value="{{auth()->user()->address}}">
                 </div>
                 <div class="d-flex m-2">
                     <span class="m-1 w-50">Note</span><textarea type="text" class="form-control form-control-sm" name="note"></textarea>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Order</button>
             </div>
         </div>
     </div>
 </form>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

@endsection

