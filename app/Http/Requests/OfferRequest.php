<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar'=> 'required|max:100|unique:offers,name_ar',
            'name_en'=> 'required|max:100|unique:offers,name_en',
            'description_ar'=>'required',
            'description_en'=>'required',
            'price'=> 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required'=>__('messages.offer name required'),
            'name_en.required'=>__('messages.offer name required'),
            'name_ar.unique'=>__('messages.name must be unique'),
            'name_en.unique'=>__('messages.name must be unique'),
            'price.numeric'=> __('messages.price must be numeric'),
            'price.required'=>__('messages.price name required'),
            'description_ar.required'=>__('messages.description name required'),
            'description_en.required'=>__('messages.description name required'),

        ];
    }
}
