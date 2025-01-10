<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandsRequest extends FormRequest
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
             $image = strpos(request()->route()->uri, 'update') ?   'nullable' : 'required';

        return [
            'name' => 'required|max:50|unique:brands,name' . $id,
            'status'=>"required|in:0,1",
            'image'=>$image
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
            alert()->error(' برندس', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        });
    }
}
