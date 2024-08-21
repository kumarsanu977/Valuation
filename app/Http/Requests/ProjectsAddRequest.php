<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectsAddRequest extends FormRequest
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
            
				"date" => "required|date",
				"project_name" => "required|string",
				"bank" => "required|string",
				"bank_branch" => "required|string",
				"consultancy" => "required|string",
				"consultancy_branch" => "required|string",
				"market_value" => "required|numeric",
            
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
