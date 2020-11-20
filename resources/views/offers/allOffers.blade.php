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
                <td>
                    <a href="{{route('offers.show',$offer->id)}}" class="btn btn-primary">{{__('messages.show')}}</a>
                    <a href="{{route('offers.edit',$offer->id)}}" class="btn btn-primary">{{__('messages.edit')}}</a>
                    <form action="{{route('offers.destroy',$offer->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">{{__('messages.delete')}}</button>
                    </form>

                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
