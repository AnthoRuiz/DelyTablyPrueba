<?php

namespace future\Http\Requests;

use Dingo\Api\Http\FormRequest as Request;

class CreateContentRequest extends Request
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
            'title'=> 'required|max:255',
            'description'=> 'required',
            'publishing_date'=> 'required|date_format:Y/m/d',
            'exp_date'=> 'required|date_format:Y/m/d|after:publishing_date',
            'authorEmail'=> 'required|email|max:255',
            'category'=> 'required',
        ];
    }
}