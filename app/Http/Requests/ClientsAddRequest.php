<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsAddRequest extends FormRequest
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
				"clients_name" => "required|string",
				"cpermanent_address" => "required|string",
				"cpresent_address" => "required|string",
				"ccontact_no" => "required|string",
				"ccertificates_address" => "required|string",
				"ccitizenship_no" => "required|string",
				"ccitizenship_issuing_office" => "required|string",
				"ccitizenship_issuing_date" => "required|date",
				"cfathers_name" => "required|string",
				"cgrandfathers_name" => "required|string",
            
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
