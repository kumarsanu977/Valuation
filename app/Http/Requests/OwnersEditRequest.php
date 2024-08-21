<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnersEditRequest extends FormRequest
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
            
				"project_id" => "filled",
				"owners_name" => "filled|string",
				"wpermanent_address" => "filled|string",
				"wpresent_address" => "filled|string",
				"wcontact_no" => "filled|string",
				"wcertificates_address" => "filled|string",
				"wcitizenship_no" => "filled|string",
				"wcitizenship_issuing_office" => "filled|string",
				"wcitizenship_issuing_date" => "filled|date",
				"wfathers_name" => "filled|string",
				"wgrandfathers_name" => "filled|string",
            
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
