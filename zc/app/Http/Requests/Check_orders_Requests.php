<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Check_orders_Requests extends FormRequest
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
            'mobile'=>[
                'required',
                'regex:/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\\d{8}$/',
                
            ],
            
            'user_name'=>'required|min:6,max:255',
            'return_id'=>[
                'required',
                'regex:/^\+?[1-9][0-9]*$/',
                    
            ],
            'order_num'=>[
                'required',
                'regex:/^\+?[1-9][0-9]*$/',
                    
            ],
            'money'=>[
                'required',
                'regex:/^\+?[1-9][0-9]*$/',
                    
            ],
            'crowfd_id'=>[
                'required',
                'regex:/^\+?[1-9][0-9]*$/',
                    
            ],
            'adress'=>'required|max:400',
            'base'=>'required|max:400',
        ];
    }
}
