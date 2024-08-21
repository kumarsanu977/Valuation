<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlotsAddRequest extends FormRequest
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
            
				"owner_id" => "required",
				"plot_no" => "required|string",
				"vdc_address" => "required|string",
				"vdc_ward" => "required|numeric",
				"present_address" => "required|string",
				"present_ward" => "required|numeric",
				"rapd" => "required|numeric",
				"sqm" => "required|numeric",
				"length_m" => "required|numeric",
				"breadth_m" => "required|numeric",
				"east" => "required|string",
				"west" => "required|string",
				"north" => "required|string",
				"south" => "required|string",
				"projectid" => "required|numeric",
            
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
