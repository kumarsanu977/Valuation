<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnersAddRequest extends FormRequest
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
            
				"project_id" => "required",
				"owners_name" => "required|string",
				"wpermanent_address" => "required|string",
				"wpresent_address" => "required|string",
				"wcontact_no" => "required|string",
				"wcertificates_address" => "required|string",
				"wcitizenship_no" => "required|string",
				"wcitizenship_issuing_office" => "required|string",
				"wcitizenship_issuing_date" => "required|date",
				"wfathers_name" => "required|string",
				"wgrandfathers_name" => "required|string",
            
        ];
    }

	public function messages()
    {
        return [
			
            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
