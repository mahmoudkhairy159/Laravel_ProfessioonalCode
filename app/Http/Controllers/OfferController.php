<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Dotenv\Validator;
use Illuminate\Http\Request;
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
            'price')->get();
        return view('offers.allOffers')->with('offers',$offers);

    }

    public function create()
    {
        return view('offers.createOfferForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
