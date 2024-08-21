<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsEditRequest extends FormRequest
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
				"clients_name" => "filled|string",
				"cpermanent_address" => "filled|string",
				"cpresent_address" => "filled|string",
				"ccontact_no" => "filled|string",
				"ccertificates_address" => "filled|string",
				"ccitizenship_no" => "filled|string",
				"ccitizenship_issuing_office" => "filled|string",
				"ccitizenship_issuing_date" => "filled|date",
				"cfathers_name" => "filled|string",
				"cgrandfathers_name" => "filled|string",
            
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
