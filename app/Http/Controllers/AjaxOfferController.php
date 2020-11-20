<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

class AjaxOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }
}
