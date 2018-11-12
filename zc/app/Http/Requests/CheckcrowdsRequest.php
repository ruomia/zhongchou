<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckcrowdsRequest extends FormRequest
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
            // 'title'=>'required|min:6,max:255',
            // 'content'=>'required',
            // 'accessable'=>'required|in:public,protected,private',
            'id_card'=>[
                'required',
                'regex:/^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/',
            ],
            'link_man'=>'required|max:255',
            'link_phone'=>[
                'required',
                'regex:/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\\d{8}$/',
                
            ], 
            'type'=>'required|in:公益,农业,出版,娱乐,艺术,其它',
            'id_imgz'=>'required|image|max:2048',
            'id_imgf'=>'required|image|max:2048',
            'crowfd_img'=>'required|image|max:2048',
            'title'=>'required|min:6,max:255',
            'aim'=>'required|min:6,max:255',
            'target'=>[
                'required',
                'regex:/^\+?[1-9][0-9]*$/',
                'max:7',     
            ],
            'day'=>[
                'required',
                'regex:/^\+?[1-9][0-9]*$/',
                'max:2',    
            ],
            'tag'=>'required|min:6,max:255',
            're.*.money' => [
                'required',
                'regex:/^\+?[1-9][0-9]*$/',
                'max:3',     
            ],
            're.*.title' => 'required|min:6,max:255',
            're.*.content'=>'required|min:6,max:255',
            're.*.people_num'=>[
                'required',
                'regex:/^\+?[1-9][0-9]*$/',
                'max:3',     
            ],
            're.*.img'=> 'required|image|max:2048',
            
        ];
    }
}
