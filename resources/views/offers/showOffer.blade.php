@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="preview-pic tab-content">
                    <div class="tab-pane active" id="pic-1"><img src="{{ asset('storage/'.$offer->photo) }}" /></div>
                    <div class="details col-md-6">
                        <h3 class="offer-title"> {{$offer->name}}</h3>
                        <p class="product-description">{{$offer->description}}</p>
                        <h4 class="price">{{__('messages.current price')}}: <span>{{$offer->price}}{{__('messages.$')}}</span></h4>
                        <h5 class="price">{{__('messages.views count')}}: <span>{{$offer->viewCount}}</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
