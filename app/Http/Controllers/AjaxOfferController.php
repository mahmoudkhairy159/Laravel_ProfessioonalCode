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
        $offer=Offer::find($id);
        if(! $offer){
            return redirect()->back();
        }
        return view('ajaxOffers.editAjaxOfferForm')->with('offer',$offer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, $id)
    {
        $offer=Offer::find($id);
        if(! $offer){
            return response()->json([
                'status' => false,
                'msg' => 'هذ العرض غير موجود',
            ]);        }

        $offer->update([
            'name_ar'=> $request->name_ar,
            'description_ar'=>$request->description_ar,
            'name_en'=> $request->name_en,
            'description_en'=>$request->description_en,
            'price'=> $request->price,
        ]);
        if($request->hasFile('photo')) {
            //delete old photo from storage
            Storage::disk('public')->delete($offer->photo);
            //adding new photo
            $offer->update([
                'photo' => $request->photo->store('images/offers', 'public'),
            ]);
        }
        //return redirect(route('offers.index'));
        return response()->json($offer);

    }


    public function destroy($id)
    {

        $offer = Offer::find($id);
        $offer->delete();
       return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);


    }
}
