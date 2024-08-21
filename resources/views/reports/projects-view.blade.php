
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Project Details</h1></div>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th>Project Id</th>
            <td>{{ $record->project_id }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $record->date }}</td>
        </tr>
        <tr>
            <th>Project Name</th>
            <td>{{ $record->project_name }}</td>
        </tr>
        <tr>
            <th>Bank</th>
            <td>{{ $record->bank }}</td>
        </tr>
        <tr>
            <th>Bank Branch</th>
            <td>{{ $record->bank_branch }}</td>
        </tr>
        <tr>
            <th>Consultancy</th>
            <td>{{ $record->consultancy }}</td>
        </tr>
        <tr>
            <th>Consultancy Branch</th>
            <td>{{ $record->consultancy_branch }}</td>
        </tr>
        <tr>
            <th>Market Value</th>
            <td>{{ $record->market_value }}</td>
        </tr>
    </tbody>
</table>
@endsection
