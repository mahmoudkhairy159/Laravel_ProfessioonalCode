@extends('layouts.app')
@section('content')

    <div class="alert alert-success" id="success_msg" style="display: none;">
        تم  التحديث بنجاح
    </div>
    <form  id="updateOfferForm" >
        @csrf
        <div class="form-group">
            <label for="offerName">{{__('messages.offer name en')}}</label>
            <input type="text" class="form-control" id="offerName" name="name_en" value="{{$offer->name_en}}">
            @error('name_en')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="offerName">{{__('messages.offer name ar')}}</label>
            <input type="text" class="form-control" id="offerName" name="name_ar" value="{{$offer->name_ar}}">
            @error('name_ar')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="offerDescription">{{__('messages.offer description en')}}</label>
            <input type="text" class="form-control" id="offerPrice" name="description_en" value="{{$offer->description_en}}">
            @error('description_en')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="offerDescription">{{__('messages.offer description ar')}}</label>
            <input type="text" class="form-control" id="offerPrice" name="description_ar" value="{{$offer->description_ar}}">
            @error('description_ar')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="offerPrice">{{__('messages.offer price')}}</label>
            <input type="text" class="form-control" id="offerPrice" name="price" value="{{$offer->price}}">
            @error('price')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <img src="{{ asset('storage/'.$offer->photo) }}" class="card-img-top" style="width: 18rem;" >
        </div>

        <div class="form-group">
            <label for="offerPhoto">{{__('messages.offer upload photo')}}</label>
            <input type="file" class="form-control" id="offerPhoto" name="photo" >
            @error('photo')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" id="updateOffer"  offer-id="{{ $offer->id }}" csrf-token="{{ csrf_token() }}" class="btn btn-primary">{{__('messages.edit')}}</button>
    </form>
@endsection

@section('scripts')
    <script>

        $(document).on('click', '#updateOffer', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = $(this).attr("offer-id");
            var formData = new FormData($("#updateOfferForm")[0]);


            $.ajax({
                type: 'put',
                enctype: 'multipart/form-data',
                url: "/ajaxOffers/"+id,
                dataType: "JSON",
                data: formData ,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if(data.status == true){
                        $('#success_msg').show();
                    }
                }, error: function (reject) {
                }
            });
        });

    </script>

@endsection



