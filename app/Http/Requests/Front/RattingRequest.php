<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class RattingRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
        $id = strpos(request()->route()->uri, 'update') ? ',' . request()->id : '';

        return [

                'product_id' => 'required|unique:rattings,product_id|exists:products,id',
                'ratting'=>'required',
                'note'=>'required',
                //
        ];
    }
     public function messages()
    {
        return [
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            alert()->error(' ', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        });
    }
}
