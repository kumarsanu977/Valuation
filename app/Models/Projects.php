<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Projects extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'projects';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'project_id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'date','project_name','bank','bank_branch','consultancy','consultancy_branch','market_value'
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
				Project_ID LIKE ?  OR 
				Project_name LIKE ?  OR 
				Bank LIKE ?  OR 
				Bank_Branch LIKE ?  OR 
				Consultancy LIKE ?  OR 
				Consultancy_Branch LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"Project_ID AS project_id",
			"Date AS date",
			"Project_name AS project_name",
			"Bank AS bank",
			"Bank_Branch AS bank_branch",
			"Consultancy AS consultancy",
			"Consultancy_Branch AS consultancy_branch",
			"Market_Value AS market_value" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"Project_ID AS project_id",
			"Date AS date",
			"Project_name AS project_name",
			"Bank AS bank",
			"Bank_Branch AS bank_branch",
			"Consultancy AS consultancy",
			"Consultancy_Branch AS consultancy_branch",
			"Market_Value AS market_value" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"Project_ID AS project_id",
			"Date AS date",
			"Project_name AS project_name",
			"Bank AS bank",
			"Bank_Branch AS bank_branch",
			"Consultancy AS consultancy",
			"Consultancy_Branch AS consultancy_branch",
			"Market_Value AS market_value" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"Project_ID AS project_id",
			"Date AS date",
			"Project_name AS project_name",
			"Bank AS bank",
			"Bank_Branch AS bank_branch",
			"Consultancy AS consultancy",
			"Consultancy_Branch AS consultancy_branch",
			"Market_Value AS market_value" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"Project_ID AS project_id",
			"Date AS date",
			"Project_name AS project_name",
			"Bank AS bank",
			"Bank_Branch AS bank_branch",
			"Consultancy AS consultancy",
			"Consultancy_Branch AS consultancy_branch",
			"Market_Value AS market_value" 
		];
	}
}
