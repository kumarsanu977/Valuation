<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Edit Owner"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="edit" data-page-url="{{ url()->full() }}">
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
                        <div class="h5 font-weight-bold text-primary">Edit Owner</div>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("owners/edit/$rec_id"); ?>" method="post">
                        <!--[form-content-start]-->
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
                                                $selected = ( $value == $data['project_id'] ? 'selected' : null );
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
                                        <label class="control-label" for="owners_name">Owners Name <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-owners_name-holder" class=" ">
                                            <input id="ctrl-owners_name" data-field="owners_name"  value="<?php  echo $data['owners_name']; ?>" type="text" placeholder="Enter Owners Name"  required="" name="owners_name"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="wpermanent_address">Wpermanent Address <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-wpermanent_address-holder" class=" ">
                                            <input id="ctrl-wpermanent_address" data-field="wpermanent_address"  value="<?php  echo $data['wpermanent_address']; ?>" type="text" placeholder="Enter Wpermanent Address"  required="" name="wpermanent_address"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="wpresent_address">Wpresent Address <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-wpresent_address-holder" class=" ">
                                            <input id="ctrl-wpresent_address" data-field="wpresent_address"  value="<?php  echo $data['wpresent_address']; ?>" type="text" placeholder="Enter Wpresent Address"  required="" name="wpresent_address"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="wcontact_no">Wcontact No <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-wcontact_no-holder" class=" ">
                                            <input id="ctrl-wcontact_no" data-field="wcontact_no"  value="<?php  echo $data['wcontact_no']; ?>" type="text" placeholder="Enter Wcontact No"  required="" name="wcontact_no"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="wcertificates_address">Wcertificates Address <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-wcertificates_address-holder" class=" ">
                                            <input id="ctrl-wcertificates_address" data-field="wcertificates_address"  value="<?php  echo $data['wcertificates_address']; ?>" type="text" placeholder="Enter Wcertificates Address"  required="" name="wcertificates_address"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="wcitizenship_no">Wcitizenship No <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-wcitizenship_no-holder" class=" ">
                                            <input id="ctrl-wcitizenship_no" data-field="wcitizenship_no"  value="<?php  echo $data['wcitizenship_no']; ?>" type="text" placeholder="Enter Wcitizenship No"  required="" name="wcitizenship_no"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="wcitizenship_issuing_office">Wcitizenship Issuing Office <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-wcitizenship_issuing_office-holder" class=" ">
                                            <input id="ctrl-wcitizenship_issuing_office" data-field="wcitizenship_issuing_office"  value="<?php  echo $data['wcitizenship_issuing_office']; ?>" type="text" placeholder="Enter Wcitizenship Issuing Office"  required="" name="wcitizenship_issuing_office"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="wcitizenship_issuing_date">Wcitizenship Issuing Date <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-wcitizenship_issuing_date-holder" class="input-group ">
                                            <input id="ctrl-wcitizenship_issuing_date" data-field="wcitizenship_issuing_date" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['wcitizenship_issuing_date']; ?>" type="datetime" name="wcitizenship_issuing_date" placeholder="Enter Wcitizenship Issuing Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="wfathers_name">Wfathers Name <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-wfathers_name-holder" class=" ">
                                            <input id="ctrl-wfathers_name" data-field="wfathers_name"  value="<?php  echo $data['wfathers_name']; ?>" type="text" placeholder="Enter Wfathers Name"  required="" name="wfathers_name"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="wgrandfathers_name">Wgrandfathers Name <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-wgrandfathers_name-holder" class=" ">
                                            <input id="ctrl-wgrandfathers_name" data-field="wgrandfathers_name"  value="<?php  echo $data['wgrandfathers_name']; ?>" type="text" placeholder="Enter Wgrandfathers Name"  required="" name="wgrandfathers_name"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-ajax-status"></div>
                        <!--[form-content-end]-->
                        <!--[form-button-start]-->
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">
                            Update
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
