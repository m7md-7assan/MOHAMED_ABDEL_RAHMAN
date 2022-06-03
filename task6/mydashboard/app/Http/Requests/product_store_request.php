<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class product_store_request extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        [
            'name_ar'=>['required','string','min:2','max:512'],
            'name_en'=>['required','string','min:2','max:512'],
            'details_ar'=>['required','string'],
            'details_ar'=>['required','string'],
            'code'=>['required','int','unique:products','digits:6'],
            'price'=>['required','numeric','min:1','max:9999999,99'],
            'status'=>['nullable','int','in:0,1'],
            'subcategory_id'=>['required','int','exists:subcategories,id'],
            'image'=>['required','mimes:png,jpg','max:1000']

        ];
    }
}
