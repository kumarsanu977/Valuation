<?php 
namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components data Model
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Model
 */
class ComponentsData{
	

	/**
     * project_id_option_list Model Action
     * @return array
     */
	function project_id_option_list(){
		$sqltext = "SELECT Project_ID as value, project_name as label FROM projects";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * owner_id_option_list Model Action
     * @return array
     */
	function owner_id_option_list(){
		$sqltext = "SELECT Owner_ID as value, owners_name as label FROM owners";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
}
