<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlotsEditRequest extends FormRequest
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
            
				"owner_id" => "filled",
				"plot_no" => "filled|string",
				"vdc_address" => "filled|string",
				"vdc_ward" => "filled|numeric",
				"present_address" => "filled|string",
				"present_ward" => "filled|numeric",
				"rapd" => "filled|numeric",
				"sqm" => "filled|numeric",
				"length_m" => "filled|numeric",
				"breadth_m" => "filled|numeric",
				"east" => "filled|string",
				"west" => "filled|string",
				"north" => "filled|string",
				"south" => "filled|string",
				"projectid" => "filled|numeric",
            
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
