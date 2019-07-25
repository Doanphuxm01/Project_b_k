<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name'=>'required|min:2|max:255|unique:posts,name',
            'detail' => 'required',
            'author' => 'required',
        ];
    }
    public  function messages(){
        return[
            'required'=>':attribute cannot be left blank',
            'detail.required'=>':attribute cannot be left blank',
            'author.required'=>':attribute cannot be left blank',
            'min' => ':attribute phai co 2 - 255 ky tu',
            'max' => ':attribute phai co 2 - 255 ky tu',
            'unique' => ':attribute da ton tai ',
        ];
    }
    public function attributes(){
        return [
            'name' => 'name', 
             'detail' => 'detail',
              'author' => 'author',
        ];
    }
}
