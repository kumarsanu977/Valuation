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
    $pageTitle = "Projects"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Projects</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("projects/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Project 
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
                    <div id="projects-list-records">
                        <div class="row gutter-lg ">
                            <div class="col">
                                <div id="page-main-content" class="table-responsive">
                                    <?php Html::page_bread_crumb("/projects/", $field_name, $field_value); ?>
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
                                                <th class="td-" > </th><th class="td-project_id" > Project Id</th>
                                                <th class="td-date" > Date</th>
                                                <th class="td-project_name" > Project Name</th>
                                                <th class="td-bank" > Bank</th>
                                                <th class="td-bank_branch" > Bank Branch</th>
                                                <th class="td-consultancy" > Consultancy</th>
                                                <th class="td-consultancy_branch" > Consultancy Branch</th>
                                                <th class="td-market_value" > Market Value</th>
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
                                                $rec_id = ($data['project_id'] ? urlencode($data['project_id']) : null);
                                                $counter++;
                                            ?>
                                            <tr>
                                                <td class=" td-checkbox">
                                                    <label class="form-check-label">
                                                    <input class="optioncheck form-check-input" name="optioncheck[]" value="<?php echo $data['project_id'] ?>" type="checkbox" />
                                                    </label>
                                                </td>
                                                <!--PageComponentStart-->
                                                <td class="td-masterdetailbtn">
                                                    <a data-page-id="projects-detail-page" class="btn btn-sm btn-secondary open-master-detail-page" href="<?php print_link("projects/masterdetail/$data[project_id]"); ?>">
                                                    <i class="material-icons">more_vert</i> 
                                                </a>
                                            </td>
                                            <td class="td-project_id">
                                                <a href="<?php print_link("/projects/view/$data[project_id]") ?>"><?php echo $data['project_id']; ?></a>
                                            </td>
                                            <td class="td-date">
                                                <?php echo  $data['date'] ; ?>
                                            </td>
                                            <td class="td-project_name">
                                                <?php echo  $data['project_name'] ; ?>
                                            </td>
                                            <td class="td-bank">
                                                <?php echo  $data['bank'] ; ?>
                                            </td>
                                            <td class="td-bank_branch">
                                                <?php echo  $data['bank_branch'] ; ?>
                                            </td>
                                            <td class="td-consultancy">
                                                <?php echo  $data['consultancy'] ; ?>
                                            </td>
                                            <td class="td-consultancy_branch">
                                                <?php echo  $data['consultancy_branch'] ; ?>
                                            </td>
                                            <td class="td-market_value">
                                                <?php echo  $data['market_value'] ; ?>
                                            </td>
                                            <!--PageComponentEnd-->
                                            <td class="td-btn">
                                                <div class="dropdown" >
                                                    <button data-bs-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                                    <i class="material-icons">menu</i> 
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <a class="dropdown-item "   href="<?php print_link("projects/view/$rec_id"); ?>" >
                                                        <i class="material-icons">visibility</i> View
                                                    </a>
                                                    <a class="dropdown-item "   href="<?php print_link("projects/edit/$rec_id"); ?>" >
                                                    <i class="material-icons">edit</i> Edit
                                                </a>
                                                <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("projects/delete/$rec_id"); ?>" >
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
                            <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("projects/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
                    <div id="projects-detail-page" class="master-detail-page"></div>
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
