@extends('layouts.app')
@section('content')
    <div class="alert alert-success" id="success_msg" style="display: none"> تم الحذف بنجاح</div>
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
                    <a href="{{route('ajaxOffers.show',$offer->id)}}" class="btn btn-primary">{{__('messages.show')}}</a>
                    <a href="{{route('ajaxOffers.edit',$offer->id)}}" class="btn btn-primary">{{__('messages.edit')}}</a>
                    <button class="deleteOffer" offer-id="{{ $offer->id }}" csrf-token="{{ csrf_token() }}" >{{__('messages.delete')}}</button>


                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
//AjaxDelete
@section('scripts')
    <script>
        $(".deleteOffer").click(function(){
            var id = $(this).attr("offer-id");
            var token = $(this).attr("csrf-token");
            $.ajax(
                {
                    url: "ajaxOffers/"+id,
                    type: 'delete',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (data)
                    {
                        location.reload();

                    }, error: function (data) {
                        alert(data);
                    }
                });

        });

    </script>

@endsection

