<?php 

namespace App\Exports;
use App\Models\Projects;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class ProjectsViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(Projects::exportViewFields());
        $this->rec_id = $rec_id;
    }


    public function query()
    {
        return $this->query->where("project_id", $this->rec_id);
    }


	public function headings(): array
    {
        return [
			'Project Id',
			'Date',
			'Project Name',
			'Bank',
			'Bank Branch',
			'Consultancy',
			'Consultancy Branch',
			'Market Value'
        ];
    }


    public function map($record): array
    {
        return [
			$record->project_id,
			$record->date,
			$record->project_name,
			$record->bank,
			$record->bank_branch,
			$record->consultancy,
			$record->consultancy_branch,
			$record->market_value
        ];
    }
}
