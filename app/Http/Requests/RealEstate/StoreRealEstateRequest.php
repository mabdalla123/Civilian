<?php

namespace App\Http\Requests\RealEstate;

use Illuminate\Foundation\Http\FormRequest;

class StoreRealEstateRequest extends FormRequest
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
          'name'=>'required|string',
          'description'=>'required|string',
          'real_estate_type_id'=>'required|exists:real_estate_types,id',
          'files'=>'required',
        ];
    }
}
