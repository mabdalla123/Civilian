<?php

namespace App\Http\Requests\Acceptances;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcceptancesRequest extends FormRequest
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
            'city_id'=>'required|exists:cities,id',
            'university_name'=>'required|string',
            'Fees'=>'required|numeric'
        ];
    }
}
