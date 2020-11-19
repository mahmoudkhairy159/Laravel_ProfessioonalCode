@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('offers.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="offerName">{{__('messages.offer name en')}}</label>
            <input type="text" class="form-control" id="offerName" name="name_en" placeholder="Enter offer name">
            @error('name_en')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="offerName">{{__('messages.offer name ar')}}</label>
            <input type="text" class="form-control" id="offerName" name="name_ar" placeholder="Enter offer name">
            @error('name_ar')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="offerDescription">{{__('messages.offer description en')}}</label>
            <input type="text" class="form-control" id="offerPrice" name="description_en" placeholder="Enter offer description">
            @error('description_en')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="offerDescription">{{__('messages.offer description ar')}}</label>
            <input type="text" class="form-control" id="offerPrice" name="description_ar" placeholder="Enter offer description">
            @error('description_ar')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="offerPrice">{{__('messages.offer price')}}</label>
            <input type="text" class="form-control" id="offerPrice" name="price" placeholder="Enter offer price">
            @error('price')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="offerPhoto">{{__('messages.offer upload photo')}}</label>
            <input type="file" class="form-control" id="offerPrice" name="photo" >
            @error('photo')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
