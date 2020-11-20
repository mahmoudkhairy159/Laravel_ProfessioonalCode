<?php

namespace App\Http\Controllers;

use App\Events\OfferViewer;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class OfferController extends Controller
{

    public function index()
    {
        //$offers=Offer::all();
        $offers=Offer::select(
            'id',
            'name_'.LaravelLocalization::getCurrentLocale() . ' as name',
            'description_'.LaravelLocalization::getCurrentLocale() .' as description' ,
            'price',
            'photo')->get();
        return view('offers.allOffers')->with('offers',$offers);

    }


    public function create()
    {
        return view('offers.createOfferForm');
    }


    public function store(OfferRequest $request)
    {
        //Validate
        /*$rules=$this->getRules();
       $messages=$this->getMessages();
        $validator= \Illuminate\Support\Facades\Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }*/

        //insert
        Offer::create([
            'name_ar'=> $request->name_ar,
            'description_ar'=>$request->description_ar,
            'name_en'=> $request->name_en,
            'description_en'=>$request->description_en,
            'price'=> $request->price,
            'photo'=>$request->photo->store('images/offers','public'),

        ]);
        return redirect(route('home'));
    }

    /*
    private function getRules(){
        $rules=[
            'name'=> 'required|max:100|unique:offers,name',
            'price'=> 'required|numeric',
            'description'=>'required'
        ];
        return $rules;
    }

    private function getMessages(){
        $messages=[
            'name.required'=>__('messages.offer name'),
            'name.unique'=>__('messages.name unique'),
            'price.numeric'=> __('messages.price numeric'),
            'price.required'=>__('messages.price name'),
            'description.required'=>__('messages.description name'),

        ];
        return $messages;
    }*/


    public function show($id)
    {
        $offer=Offer::find($id,[
            'id',
            'name_'.LaravelLocalization::getCurrentLocale() . ' as name',
            'description_'.LaravelLocalization::getCurrentLocale() .' as description' ,
            'price',
            'photo',
            'viewCount']);
        event(new OfferViewer($offer));
        return view('offers.showOffer')->with('offer',$offer);
    }


    public function edit($id)
    {
        $offer=Offer::find($id);
        if(! $offer){
            return redirect()->back();
        }
        return view('offers.editOfferForm')->with('offer',$offer);

    }


    public function update(OfferRequest $request, $id)
    {
        $offer=Offer::find($id);
        if(! $offer){
            return redirect()->back();
        }

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
        return redirect(route('offers.index'));
    }


    public function destroy($id)
    {
        $offer=Offer::find($id);
        if(! $offer){
            return redirect()->back();
        }
        Storage::disk('public')->delete($offer->photo);
        $offer->delete();
        return redirect(route('offers.index'));

    }
}
