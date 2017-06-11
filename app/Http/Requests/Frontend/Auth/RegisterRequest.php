<?php

namespace App\Http\Requests\Frontend\Auth;

use App\Http\Requests\Request;

/**
 * Class RegisterRequest
 * @package App\Http\Requests\Frontend\Access
 */
class RegisterRequest extends Request
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
            
            'name' => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|confirmed|min:6',
            // 'gender'    => 'required|not_in:Select One...',
            // 'month'     => 'required|not_in:Month',
            // 'day'       => 'required|max:225',
            // 'mykad'     => 'required|digits:12',
            // 'marital_status' => 'required|not_in:Select One...',
           
            // 'race'      => 'required|not_in:Select One...',
            // 'eCenter'   => 'required|not_in:Select One...',
            // 'term_condition' => 'required',
            
        ];
    }
}
