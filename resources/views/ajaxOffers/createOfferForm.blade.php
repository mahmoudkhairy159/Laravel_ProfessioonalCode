@extends('layouts.app')
@section('content')
    <form id="createOfferForm" >
        @csrf
        <div class="form-group">
            <label for="offerName">{{__('messages.offer name en')}}</label>
            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Enter offer name">
            @error('name_en')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="offerName">{{__('messages.offer name ar')}}</label>
            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="Enter offer name">
            @error('name_ar')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="offerDescription">{{__('messages.offer description en')}}</label>
            <input type="text" class="form-control" id="description_en" name="description_en" placeholder="Enter offer description">
            @error('description_en')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="offerDescription">{{__('messages.offer description ar')}}</label>
            <input type="text" class="form-control" id="description_ar" name="description_ar" placeholder="Enter offer description">
            @error('description_ar')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="offerPrice">{{__('messages.offer price')}}</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Enter offer price">
            @error('price')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="offerPhoto">{{__('messages.offer upload photo')}}</label>
            <input type="file" class="form-control" id="photo" name="photo" >
            @error('photo')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>

        <button id="saveAjaxOffer" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '#saveAjaxOffer', function (e) {

            var formData = new FormData($('#createOfferForm')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('ajaxOffers.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                        $('#success_msg').show();
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });

    </script>

@endsection
