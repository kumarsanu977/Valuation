<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Client"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto  back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="material-icons">arrow_back</i>                                
                    </a>
                </div>
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Add New Client</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid " >
                    <div  class="card card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form id="clients-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('clients.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="project_id">Project Id <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-project_id-holder" class=" ">
                                                <select required=""  id="ctrl-project_id" data-field="project_id" name="project_id"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->project_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('project_id', $value, "");
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="clients_name">Clients Name <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-clients_name-holder" class=" ">
                                                <input id="ctrl-clients_name" data-field="clients_name"  value="<?php echo get_value('clients_name') ?>" type="text" placeholder="Enter Clients Name"  required="" name="clients_name"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="cpermanent_address">Cpermanent Address <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-cpermanent_address-holder" class=" ">
                                                <input id="ctrl-cpermanent_address" data-field="cpermanent_address"  value="<?php echo get_value('cpermanent_address') ?>" type="text" placeholder="Enter Cpermanent Address"  required="" name="cpermanent_address"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="cpresent_address">Cpresent Address <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-cpresent_address-holder" class=" ">
                                                <input id="ctrl-cpresent_address" data-field="cpresent_address"  value="<?php echo get_value('cpresent_address') ?>" type="text" placeholder="Enter Cpresent Address"  required="" name="cpresent_address"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ccontact_no">Ccontact No <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-ccontact_no-holder" class=" ">
                                                <input id="ctrl-ccontact_no" data-field="ccontact_no"  value="<?php echo get_value('ccontact_no') ?>" type="text" placeholder="Enter Ccontact No"  required="" name="ccontact_no"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ccertificates_address">Ccertificates Address <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-ccertificates_address-holder" class=" ">
                                                <input id="ctrl-ccertificates_address" data-field="ccertificates_address"  value="<?php echo get_value('ccertificates_address', "''") ?>" type="text" placeholder="Enter Ccertificates Address"  required="" name="ccertificates_address"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ccitizenship_no">Ccitizenship No <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-ccitizenship_no-holder" class=" ">
                                                <input id="ctrl-ccitizenship_no" data-field="ccitizenship_no"  value="<?php echo get_value('ccitizenship_no') ?>" type="text" placeholder="Enter Ccitizenship No"  required="" name="ccitizenship_no"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ccitizenship_issuing_office">Ccitizenship Issuing Office <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-ccitizenship_issuing_office-holder" class=" ">
                                                <input id="ctrl-ccitizenship_issuing_office" data-field="ccitizenship_issuing_office"  value="<?php echo get_value('ccitizenship_issuing_office') ?>" type="text" placeholder="Enter Ccitizenship Issuing Office"  required="" name="ccitizenship_issuing_office"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ccitizenship_issuing_date">Ccitizenship Issuing Date <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-ccitizenship_issuing_date-holder" class="input-group ">
                                                <input id="ctrl-ccitizenship_issuing_date" data-field="ccitizenship_issuing_date" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('ccitizenship_issuing_date') ?>" type="datetime" name="ccitizenship_issuing_date" placeholder="Enter Ccitizenship Issuing Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="cfathers_name">Cfathers Name <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-cfathers_name-holder" class=" ">
                                                <input id="ctrl-cfathers_name" data-field="cfathers_name"  value="<?php echo get_value('cfathers_name') ?>" type="text" placeholder="Enter Cfathers Name"  required="" name="cfathers_name"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="cgrandfathers_name">Cgrandfathers Name <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-cgrandfathers_name-holder" class=" ">
                                                <input id="ctrl-cgrandfathers_name" data-field="cgrandfathers_name"  value="<?php echo get_value('cgrandfathers_name') ?>" type="text" placeholder="Enter Cgrandfathers Name"  required="" name="cgrandfathers_name"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <!--[form-button-start]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                Submit
                                <i class="material-icons">send</i>
                                </button>
                            </div>
                            <!--[form-button-end]-->
                        </form>
                        <!--[form-end]-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
