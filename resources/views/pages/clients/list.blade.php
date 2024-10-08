<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Clients"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center gap-3">
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Clients</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("clients/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Client 
                </a>
            </div>
            <div class="col-md-3  " >
                <!-- Page drop down search component -->
                <form  class="search" action="{{ url()->current() }}" method="get">
                    <input type="hidden" name="page" value="1" />
                    <div class="input-group">
                        <input value="<?php echo get_value('search'); ?>" class="form-control page-search" type="text" name="search"  placeholder="Search" />
                        <button class="btn btn-primary"><i class="material-icons">search</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<div  class="" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col comp-grid " >
                <div  class=" page-content" >
                    <div id="clients-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <?php Html::page_bread_crumb("/clients/", $field_name, $field_value); ?>
                            <?php Html::display_page_errors($errors); ?>
                            <div class="filter-tags mb-2">
                                <?php Html::filter_tag('search', __('Search')); ?>
                            </div>
                            <table class="table table-hover table-striped table-sm text-left">
                                <thead class="table-header ">
                                    <tr>
                                        <th class="td-checkbox">
                                        <label class="form-check-label">
                                        <input class="toggle-check-all form-check-input" type="checkbox" />
                                        </label>
                                        </th>
                                        <th class="td-client_id" > Client Id</th>
                                        <th class="td-project_id" > Project Id</th>
                                        <th class="td-clients_name" > Clients Name</th>
                                        <th class="td-cpermanent_address" > Cpermanent Address</th>
                                        <th class="td-cpresent_address" > Cpresent Address</th>
                                        <th class="td-ccontact_no" > Ccontact No</th>
                                        <th class="td-ccertificates_address" > Ccertificates Address</th>
                                        <th class="td-ccitizenship_no" > Ccitizenship No</th>
                                        <th class="td-ccitizenship_issuing_office" > Ccitizenship Issuing Office</th>
                                        <th class="td-ccitizenship_issuing_date" > Ccitizenship Issuing Date</th>
                                        <th class="td-cfathers_name" > Cfathers Name</th>
                                        <th class="td-cgrandfathers_name" > Cgrandfathers Name</th>
                                        <th class="td-btn"></th>
                                    </tr>
                                </thead>
                                <?php
                                    if($total_records){
                                ?>
                                <tbody class="page-data">
                                    <!--record-->
                                    <?php
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = ($data['client_id'] ? urlencode($data['client_id']) : null);
                                        $counter++;
                                    ?>
                                    <tr>
                                        <td class=" td-checkbox">
                                            <label class="form-check-label">
                                            <input class="optioncheck form-check-input" name="optioncheck[]" value="<?php echo $data['client_id'] ?>" type="checkbox" />
                                            </label>
                                        </td>
                                        <!--PageComponentStart-->
                                        <td class="td-client_id">
                                            <a href="<?php print_link("/clients/view/$data[client_id]") ?>"><?php echo $data['client_id']; ?></a>
                                        </td>
                                        <td class="td-project_id">
                                            <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("projects/view/$data[project_id]?subpage=1") ?>">
                                            <i class="material-icons">visibility</i> <?php echo "Projects" ?>
                                        </a>
                                    </td>
                                    <td class="td-clients_name">
                                        <?php echo  $data['clients_name'] ; ?>
                                    </td>
                                    <td class="td-cpermanent_address">
                                        <?php echo  $data['cpermanent_address'] ; ?>
                                    </td>
                                    <td class="td-cpresent_address">
                                        <?php echo  $data['cpresent_address'] ; ?>
                                    </td>
                                    <td class="td-ccontact_no">
                                        <?php echo  $data['ccontact_no'] ; ?>
                                    </td>
                                    <td class="td-ccertificates_address">
                                        <?php echo  $data['ccertificates_address'] ; ?>
                                    </td>
                                    <td class="td-ccitizenship_no">
                                        <?php echo  $data['ccitizenship_no'] ; ?>
                                    </td>
                                    <td class="td-ccitizenship_issuing_office">
                                        <?php echo  $data['ccitizenship_issuing_office'] ; ?>
                                    </td>
                                    <td class="td-ccitizenship_issuing_date">
                                        <?php echo  $data['ccitizenship_issuing_date'] ; ?>
                                    </td>
                                    <td class="td-cfathers_name">
                                        <?php echo  $data['cfathers_name'] ; ?>
                                    </td>
                                    <td class="td-cgrandfathers_name">
                                        <?php echo  $data['cgrandfathers_name'] ; ?>
                                    </td>
                                    <!--PageComponentEnd-->
                                    <td class="td-btn">
                                        <div class="dropdown" >
                                            <button data-bs-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                            <i class="material-icons">menu</i> 
                                            </button>
                                            <ul class="dropdown-menu">
                                                <a class="dropdown-item "   href="<?php print_link("clients/view/$rec_id"); ?>" >
                                                <i class="material-icons">visibility</i> View
                                            </a>
                                            <a class="dropdown-item "   href="<?php print_link("clients/edit/$rec_id"); ?>" >
                                            <i class="material-icons">edit</i> Edit
                                        </a>
                                        <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("clients/delete/$rec_id"); ?>" >
                                        <i class="material-icons">delete_sweep</i> Delete
                                    </a>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php 
                        }
                    ?>
                    <!--endrecord-->
                </tbody>
                <tbody class="search-data"></tbody>
                <?php
                    }
                    else{
                ?>
                <tbody class="page-data">
                    <tr>
                        <td class="bg-light text-center text-muted animated bounce p-3" colspan="1000">
                            <i class="material-icons">block</i> No record found
                        </td>
                    </tr>
                </tbody>
                <?php
                    }
                ?>
            </table>
        </div>
        <?php
            if($show_footer){
        ?>
        <div class=" mt-3">
            <div class="row align-items-center justify-content-between">    
                <div class="col-md-auto d-flex">    
                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("clients/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                    <i class="material-icons">delete_sweep</i> Delete Selected
                    </button>
                </div>
                <div class="col">   
                    <?php
                        if($show_pagination == true){
                        $pager = new Pagination($total_records, $record_count);
                        $pager->show_page_count = false;
                        $pager->show_record_count = true;
                        $pager->show_page_limit =false;
                        $pager->limit = $limit;
                        $pager->show_page_number_list = true;
                        $pager->pager_link_range=5;
                        $pager->render();
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>


@endsection
