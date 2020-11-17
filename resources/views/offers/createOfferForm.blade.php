@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('offers.store')}}">
        @csrf
        <div class="form-group">
            <label for="offerName">Offer Name</label>
            <input type="text" class="form-control" id="offerName" name="name" placeholder="Enter offer name">
            @error('name')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="offerPrice">Offer Price</label>
            <input type="text" class="form-control" id="offerPrice" name="price" placeholder="Enter offer price">
            @error('price')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="offerDescription">Offer Description</label>
            <input type="text" class="form-control" id="offerPrice" name="description" placeholder="Enter offer description">
            @error('description')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
