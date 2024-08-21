<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Plots extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'plots';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'plot_id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'owner_id','plot_no','vdc_address','vdc_ward','present_address','present_ward','rapd','sqm','length_m','breadth_m','east','west','north','south','projectid'
	];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				Plot_ID LIKE ?  OR 
				Plot_No LIKE ?  OR 
				VDC_Address LIKE ?  OR 
				Present_Address LIKE ?  OR 
				East LIKE ?  OR 
				West LIKE ?  OR 
				North LIKE ?  OR 
				South LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"Plot_ID AS plot_id",
			"Owner_ID AS owner_id",
			"Plot_No AS plot_no",
			"VDC_Address AS vdc_address",
			"VDC_Ward AS vdc_ward",
			"Present_Address AS present_address",
			"Present_Ward AS present_ward",
			"RAPD AS rapd",
			"SQM AS sqm",
			"Length_M AS length_m",
			"Breadth_M AS breadth_m",
			"East AS east",
			"West AS west",
			"North AS north",
			"South AS south",
			"projectid" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"Plot_ID AS plot_id",
			"Owner_ID AS owner_id",
			"Plot_No AS plot_no",
			"VDC_Address AS vdc_address",
			"VDC_Ward AS vdc_ward",
			"Present_Address AS present_address",
			"Present_Ward AS present_ward",
			"RAPD AS rapd",
			"SQM AS sqm",
			"Length_M AS length_m",
			"Breadth_M AS breadth_m",
			"East AS east",
			"West AS west",
			"North AS north",
			"South AS south",
			"projectid" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"Plot_ID AS plot_id",
			"Owner_ID AS owner_id",
			"Plot_No AS plot_no",
			"VDC_Address AS vdc_address",
			"VDC_Ward AS vdc_ward",
			"Present_Address AS present_address",
			"Present_Ward AS present_ward",
			"RAPD AS rapd",
			"SQM AS sqm",
			"Length_M AS length_m",
			"Breadth_M AS breadth_m",
			"East AS east",
			"West AS west",
			"North AS north",
			"South AS south",
			"projectid" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"Plot_ID AS plot_id",
			"Owner_ID AS owner_id",
			"Plot_No AS plot_no",
			"VDC_Address AS vdc_address",
			"VDC_Ward AS vdc_ward",
			"Present_Address AS present_address",
			"Present_Ward AS present_ward",
			"RAPD AS rapd",
			"SQM AS sqm",
			"Length_M AS length_m",
			"Breadth_M AS breadth_m",
			"East AS east",
			"West AS west",
			"North AS north",
			"South AS south",
			"projectid" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"Owner_ID AS owner_id",
			"Plot_No AS plot_no",
			"VDC_Address AS vdc_address",
			"VDC_Ward AS vdc_ward",
			"Present_Address AS present_address",
			"Present_Ward AS present_ward",
			"RAPD AS rapd",
			"SQM AS sqm",
			"Length_M AS length_m",
			"Breadth_M AS breadth_m",
			"East AS east",
			"West AS west",
			"North AS north",
			"South AS south",
			"projectid",
			"Plot_ID AS plot_id" 
		];
	}
}
