<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
if(request()->all()['type']!='visa'){
             return [
                'name'=>'required|exists:users,name',
                'email'=>'required|exists:users,email',
                'phone_number'=>'required|exists:users,phone',
                'street_address'=>'required',
                'city'=>'required',
                'postal_code'=>'required',
                'state'=>'required',
                'shipping'=>'required',
                'type'=>'required|in:delivry,visa',
            ];
        }else{
            return [];
        }
    }
     public function messages()
    {
        return [
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            alert()->error(' عملية دفع', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        });
    }
}
