<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostFormRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'=>'required|min:2|max:255|unique:product,name'
        ];
    }
    public  function messages(){
        return[
            'required'=>':attribute khong duoc de trong',
            'min' => ':attribute phai co 2 - 255 ky tu',
            'max' => ':attribute phai co 2 - 255 ky tu',
            'unique' => ':attribute da ton tai ',
        ];
    }
    public function attributes(){
        return [
            'name' => 'ten danh muc san pham', 
        ];
    }
}
