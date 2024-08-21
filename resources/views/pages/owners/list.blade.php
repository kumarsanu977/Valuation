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
    $pageTitle = "Owners"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Owners</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("owners/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Owner 
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
                    <div id="owners-list-records">
                        <div class="row gutter-lg ">
                            <div class="col">
                                <div id="page-main-content" class="table-responsive">
                                    <?php Html::page_bread_crumb("/owners/", $field_name, $field_value); ?>
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
                                                <th class="td-" > </th><th class="td-owner_id" > Owner Id</th>
                                                <th class="td-project_id" > Project Id</th>
                                                <th class="td-owners_name" > Owners Name</th>
                                                <th class="td-wpermanent_address" > Wpermanent Address</th>
                                                <th class="td-wpresent_address" > Wpresent Address</th>
                                                <th class="td-wcontact_no" > Wcontact No</th>
                                                <th class="td-wcertificates_address" > Wcertificates Address</th>
                                                <th class="td-wcitizenship_no" > Wcitizenship No</th>
                                                <th class="td-wcitizenship_issuing_office" > Wcitizenship Issuing Office</th>
                                                <th class="td-wcitizenship_issuing_date" > Wcitizenship Issuing Date</th>
                                                <th class="td-wfathers_name" > Wfathers Name</th>
                                                <th class="td-wgrandfathers_name" > Wgrandfathers Name</th>
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
                                                $rec_id = ($data['owner_id'] ? urlencode($data['owner_id']) : null);
                                                $counter++;
                                            ?>
                                            <tr>
                                                <td class=" td-checkbox">
                                                    <label class="form-check-label">
                                                    <input class="optioncheck form-check-input" name="optioncheck[]" value="<?php echo $data['owner_id'] ?>" type="checkbox" />
                                                    </label>
                                                </td>
                                                <!--PageComponentStart-->
                                                <td class="td-masterdetailbtn">
                                                    <a data-page-id="owners-detail-page" class="btn btn-sm btn-secondary open-master-detail-page" href="<?php print_link("owners/masterdetail/$data[owner_id]"); ?>">
                                                    <i class="material-icons">more_vert</i> 
                                                </a>
                                            </td>
                                            <td class="td-owner_id">
                                                <a href="<?php print_link("/owners/view/$data[owner_id]") ?>"><?php echo $data['owner_id']; ?></a>
                                            </td>
                                            <td class="td-project_id">
                                                <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("projects/view/$data[project_id]?subpage=1") ?>">
                                                <i class="material-icons">visibility</i> <?php echo "Projects" ?>
                                            </a>
                                        </td>
                                        <td class="td-owners_name">
                                            <?php echo  $data['owners_name'] ; ?>
                                        </td>
                                        <td class="td-wpermanent_address">
                                            <?php echo  $data['wpermanent_address'] ; ?>
                                        </td>
                                        <td class="td-wpresent_address">
                                            <?php echo  $data['wpresent_address'] ; ?>
                                        </td>
                                        <td class="td-wcontact_no">
                                            <?php echo  $data['wcontact_no'] ; ?>
                                        </td>
                                        <td class="td-wcertificates_address">
                                            <?php echo  $data['wcertificates_address'] ; ?>
                                        </td>
                                        <td class="td-wcitizenship_no">
                                            <?php echo  $data['wcitizenship_no'] ; ?>
                                        </td>
                                        <td class="td-wcitizenship_issuing_office">
                                            <?php echo  $data['wcitizenship_issuing_office'] ; ?>
                                        </td>
                                        <td class="td-wcitizenship_issuing_date">
                                            <?php echo  $data['wcitizenship_issuing_date'] ; ?>
                                        </td>
                                        <td class="td-wfathers_name">
                                            <?php echo  $data['wfathers_name'] ; ?>
                                        </td>
                                        <td class="td-wgrandfathers_name">
                                            <?php echo  $data['wgrandfathers_name'] ; ?>
                                        </td>
                                        <!--PageComponentEnd-->
                                        <td class="td-btn">
                                            <div class="dropdown" >
                                                <button data-bs-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                                <i class="material-icons">menu</i> 
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <a class="dropdown-item "   href="<?php print_link("owners/view/$rec_id"); ?>" >
                                                    <i class="material-icons">visibility</i> View
                                                </a>
                                                <a class="dropdown-item "   href="<?php print_link("owners/edit/$rec_id"); ?>" >
                                                <i class="material-icons">edit</i> Edit
                                            </a>
                                            <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("owners/delete/$rec_id"); ?>" >
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
                        <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("owners/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
        <!-- Detail Page Column -->
        <?php if(!request()->has('subpage')){ ?>
        <div class="col-12">
            <div class=" ">
                <div id="owners-detail-page" class="master-detail-page"></div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


@endsection
