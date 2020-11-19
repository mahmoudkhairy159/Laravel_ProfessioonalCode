@extends('layouts.app')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">{{__('messages.offer photo')}} </th>
            <th scope="col">{{__('messages.offer name')}}</th>
            <th scope="col">{{__('messages.offer description')}}</th>
            <th scope="col">{{__('messages.offer price')}}</th>
            <th scope="col">{{__('messages.offer operation')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
            <tr>
                <td> <img src="{{ asset('storage/'.$offer->photo) }}" class="card-img-top" style="width:5rem;" ></td>
                <td>{{$offer->name}}</td>
                <td>{{$offer->description}}</td>
                <td>{{$offer->price}}</td>
                <td> <a href="{{route('offers.edit',$offer->id)}}" class="btn btn-primary">{{__('messages.edit')}}</a> </td>


            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
