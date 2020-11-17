@extends('layouts.app')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">{{__('messages.offer name')}}</th>
            <th scope="col">{{__('messages.offer price')}}</th>
            <th scope="col">{{__('messages.offer description')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
            <tr>
                <td>{{$offer->name}}</td>
                <td>{{$offer->description}}</td>
                <td>{{$offer->price}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
