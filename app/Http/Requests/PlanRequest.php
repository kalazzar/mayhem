<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;
use DateTime;

class PlanRequest extends Request
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

      public function messages()
    {
        
        return [
            'travBudget.required' => 'Travel Budget field is required',
            'accomoBudget.required' => 'Accomodation budget field is required',
            'interest.required' => 'Please tick interest atleast one',
            'pace.required' => 'Please choose your desired pace',
        ];
    }


        protected function getValidatorInstance()
    {
        $data = $this->all();
  
        if(isset($data['checkIn'])){
          $checkIn = DateTime::createFromFormat('j F, Y', $data['checkIn']);
          $data['checkIn'] = $checkIn->format('Y-m-d');

        }

        if(isset($data['checkOut'])){
        $checkOut = DateTime::createFromFormat('j F, Y', $data['checkOut']);
          $data['checkOut']  = $checkOut->format('Y-m-d');
        }

        $this->getInputSource()->replace($data);

        
        return parent::getValidatorInstance();
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'checkIn'=>'required',
            'checkOut'=>'required',
            'travBudget'=>'required',
            'accomoBudget'=>'required',
            'interest'=>'required',
            'pace'=>'required'
        ];
    }
}
