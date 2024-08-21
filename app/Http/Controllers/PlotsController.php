<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlotsAddRequest;
use App\Http\Requests\PlotsEditRequest;
use App\Models\Plots;
use Illuminate\Http\Request;
use Exception;
class PlotsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.plots.list";
		$query = Plots::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Plots::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "plots.plot_id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Plots::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Plots::query();
		$record = $query->findOrFail($rec_id, Plots::viewFields());
		return $this->renderView("pages.plots.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.plots.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(PlotsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Plots record
		$record = Plots::create($modeldata);
		$rec_id = $record->plot_id;
		return $this->redirect("plots", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(PlotsEditRequest $request, $rec_id = null){
		$query = Plots::query();
		$record = $query->findOrFail($rec_id, Plots::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("plots", "Record updated successfully");
		}
		return $this->renderView("pages.plots.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Plots::query();
		$query->whereIn("plot_id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
