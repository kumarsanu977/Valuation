<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Clients extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'clients';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'client_id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'project_id','clients_name','cpermanent_address','cpresent_address','ccontact_no','ccertificates_address','ccitizenship_no','ccitizenship_issuing_office','ccitizenship_issuing_date','cfathers_name','cgrandfathers_name'
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
				Client_ID LIKE ?  OR 
				Clients_Name LIKE ?  OR 
				CPermanent_Address LIKE ?  OR 
				CPresent_Address LIKE ?  OR 
				CContact_no LIKE ?  OR 
				ccertificates_address LIKE ?  OR 
				CCitizenship_No LIKE ?  OR 
				CCitizenship_Issuing_Office LIKE ?  OR 
				CFathers_Name LIKE ?  OR 
				CGrandFathers_Name LIKE ? 
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
			"Client_ID AS client_id",
			"Project_ID AS project_id",
			"Clients_Name AS clients_name",
			"CPermanent_Address AS cpermanent_address",
			"CPresent_Address AS cpresent_address",
			"CContact_no AS ccontact_no",
			"ccertificates_address",
			"CCitizenship_No AS ccitizenship_no",
			"CCitizenship_Issuing_Office AS ccitizenship_issuing_office",
			"CCitizenship_Issuing_Date AS ccitizenship_issuing_date",
			"CFathers_Name AS cfathers_name",
			"CGrandFathers_Name AS cgrandfathers_name" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"Client_ID AS client_id",
			"Project_ID AS project_id",
			"Clients_Name AS clients_name",
			"CPermanent_Address AS cpermanent_address",
			"CPresent_Address AS cpresent_address",
			"CContact_no AS ccontact_no",
			"ccertificates_address",
			"CCitizenship_No AS ccitizenship_no",
			"CCitizenship_Issuing_Office AS ccitizenship_issuing_office",
			"CCitizenship_Issuing_Date AS ccitizenship_issuing_date",
			"CFathers_Name AS cfathers_name",
			"CGrandFathers_Name AS cgrandfathers_name" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"Client_ID AS client_id",
			"Project_ID AS project_id",
			"Clients_Name AS clients_name",
			"CPermanent_Address AS cpermanent_address",
			"CPresent_Address AS cpresent_address",
			"CContact_no AS ccontact_no",
			"ccertificates_address",
			"CCitizenship_No AS ccitizenship_no",
			"CCitizenship_Issuing_Office AS ccitizenship_issuing_office",
			"CCitizenship_Issuing_Date AS ccitizenship_issuing_date",
			"CFathers_Name AS cfathers_name",
			"CGrandFathers_Name AS cgrandfathers_name" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"Client_ID AS client_id",
			"Project_ID AS project_id",
			"Clients_Name AS clients_name",
			"CPermanent_Address AS cpermanent_address",
			"CPresent_Address AS cpresent_address",
			"CContact_no AS ccontact_no",
			"ccertificates_address",
			"CCitizenship_No AS ccitizenship_no",
			"CCitizenship_Issuing_Office AS ccitizenship_issuing_office",
			"CCitizenship_Issuing_Date AS ccitizenship_issuing_date",
			"CFathers_Name AS cfathers_name",
			"CGrandFathers_Name AS cgrandfathers_name" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"Client_ID AS client_id",
			"Project_ID AS project_id",
			"Clients_Name AS clients_name",
			"CPermanent_Address AS cpermanent_address",
			"CPresent_Address AS cpresent_address",
			"CContact_no AS ccontact_no",
			"ccertificates_address",
			"CCitizenship_No AS ccitizenship_no",
			"CCitizenship_Issuing_Office AS ccitizenship_issuing_office",
			"CCitizenship_Issuing_Date AS ccitizenship_issuing_date",
			"CFathers_Name AS cfathers_name",
			"CGrandFathers_Name AS cgrandfathers_name" 
		];
	}
}
