<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
                'title'         => 'required|max:50|unique:products,title' . $id,
                'description'   => 'required',
                'content'      => 'required',
                'status'        => 'required',
                'image' => 'required_without:id',
                'category_id'   => 'required|exists:categories,id',
                'tags.*'        => 'required|exists:tags,id',
                'related_image.*'=>"required|image"
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
            alert()->error(' منتجات', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        });
    }
}
