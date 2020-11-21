<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AjaxOfferController extends Controller
{

    public function index()
    {
        $offers=Offer::select(
            'id',
            'name_'.LaravelLocalization::getCurrentLocale() . ' as name',
            'description_'.LaravelLocalization::getCurrentLocale() .' as description' ,
            'price',
            'photo')->get();
        return view('ajaxOffers.allAjaxOffers')->with('offers',$offers);
    }


    public function create()
    {
        return view('ajaxOffers.createOfferForm');

    }


    public function store(OfferRequest $request)
    {
        $offer = new Offer;
        $offer::create([
            'name_ar' => $request->name_ar,
            'description_ar' => $request->description_ar,
            'name_en' => $request->name_en,
            'description_en' => $request->description_en,
            'price' => $request->price,
            'photo' => $request->photo->store('images/offers', 'public'),

        ]);

        if ($offer) {
            return response()->json([
                'status' => true,
                'msg' => 'تم الحفظ بنجاح',
            ]);

        }else {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
        }
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $offer = Offer::find($id);
        $offer->delete();
       return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);


    }
}
