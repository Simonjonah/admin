<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Qrcode;

class UpdateQrcodeRequest extends FormRequest
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
            'user_id' => 'required',
            'subject' => 'required|max:225',
            'class' => 'required|max:225',
            'amount' => 'required',
            'callback_url' => 'required'
        ];
        // $rules = Qrcode::$rules;
        
        // return $rules;
    }
}
