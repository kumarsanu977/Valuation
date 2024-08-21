<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Owners extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'owners';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'owner_id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'project_id','owners_name','wpermanent_address','wpresent_address','wcontact_no','wcertificates_address','wcitizenship_no','wcitizenship_issuing_office','wcitizenship_issuing_date','wfathers_name','wgrandfathers_name'
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
				Owner_ID LIKE ?  OR 
				Owners_Name LIKE ?  OR 
				WPermanent_Address LIKE ?  OR 
				WPresent_Address LIKE ?  OR 
				WContact_no LIKE ?  OR 
				wcertificates_address LIKE ?  OR 
				WCitizenship_No LIKE ?  OR 
				WCitizenship_Issuing_Office LIKE ?  OR 
				WFathers_Name LIKE ?  OR 
				WGrandFathers_Name LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"Owner_ID AS owner_id",
			"Project_ID AS project_id",
			"Owners_Name AS owners_name",
			"WPermanent_Address AS wpermanent_address",
			"WPresent_Address AS wpresent_address",
			"WContact_no AS wcontact_no",
			"wcertificates_address",
			"WCitizenship_No AS wcitizenship_no",
			"WCitizenship_Issuing_Office AS wcitizenship_issuing_office",
			"WCitizenship_Issuing_Date AS wcitizenship_issuing_date",
			"WFathers_Name AS wfathers_name",
			"WGrandFathers_Name AS wgrandfathers_name" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"Owner_ID AS owner_id",
			"Project_ID AS project_id",
			"Owners_Name AS owners_name",
			"WPermanent_Address AS wpermanent_address",
			"WPresent_Address AS wpresent_address",
			"WContact_no AS wcontact_no",
			"wcertificates_address",
			"WCitizenship_No AS wcitizenship_no",
			"WCitizenship_Issuing_Office AS wcitizenship_issuing_office",
			"WCitizenship_Issuing_Date AS wcitizenship_issuing_date",
			"WFathers_Name AS wfathers_name",
			"WGrandFathers_Name AS wgrandfathers_name" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"Owner_ID AS owner_id",
			"Project_ID AS project_id",
			"Owners_Name AS owners_name",
			"WPermanent_Address AS wpermanent_address",
			"WPresent_Address AS wpresent_address",
			"WContact_no AS wcontact_no",
			"wcertificates_address",
			"WCitizenship_No AS wcitizenship_no",
			"WCitizenship_Issuing_Office AS wcitizenship_issuing_office",
			"WCitizenship_Issuing_Date AS wcitizenship_issuing_date",
			"WFathers_Name AS wfathers_name",
			"WGrandFathers_Name AS wgrandfathers_name" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"Owner_ID AS owner_id",
			"Project_ID AS project_id",
			"Owners_Name AS owners_name",
			"WPermanent_Address AS wpermanent_address",
			"WPresent_Address AS wpresent_address",
			"WContact_no AS wcontact_no",
			"wcertificates_address",
			"WCitizenship_No AS wcitizenship_no",
			"WCitizenship_Issuing_Office AS wcitizenship_issuing_office",
			"WCitizenship_Issuing_Date AS wcitizenship_issuing_date",
			"WFathers_Name AS wfathers_name",
			"WGrandFathers_Name AS wgrandfathers_name" 
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
			"Project_ID AS project_id",
			"Owners_Name AS owners_name",
			"WPermanent_Address AS wpermanent_address",
			"WPresent_Address AS wpresent_address",
			"WContact_no AS wcontact_no",
			"wcertificates_address",
			"WCitizenship_No AS wcitizenship_no",
			"WCitizenship_Issuing_Office AS wcitizenship_issuing_office",
			"WCitizenship_Issuing_Date AS wcitizenship_issuing_date",
			"WFathers_Name AS wfathers_name",
			"WGrandFathers_Name AS wgrandfathers_name" 
		];
	}
}
