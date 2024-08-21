<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Edit Plot"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Edit Plot</div>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("plots/edit/$rec_id"); ?>" method="post">
                        <!--[form-content-start]-->
                        @csrf
                        <div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="owner_id">Owner Id <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-owner_id-holder" class=" ">
                                            <select required=""  id="ctrl-owner_id" data-field="owner_id" name="owner_id"  placeholder="Select a value ..."    class="form-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                                $options = $comp_model->owner_id_option_list() ?? [];
                                                foreach($options as $option){
                                                $value = $option->value;
                                                $label = $option->label ?? $value;
                                                $selected = ( $value == $data['owner_id'] ? 'selected' : null );
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
                                        <label class="control-label" for="plot_no">Plot No <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-plot_no-holder" class=" ">
                                            <input id="ctrl-plot_no" data-field="plot_no"  value="<?php  echo $data['plot_no']; ?>" type="text" placeholder="Enter Plot No"  required="" name="plot_no"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="vdc_address">Vdc Address <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-vdc_address-holder" class=" ">
                                            <input id="ctrl-vdc_address" data-field="vdc_address"  value="<?php  echo $data['vdc_address']; ?>" type="text" placeholder="Enter Vdc Address"  required="" name="vdc_address"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="vdc_ward">Vdc Ward <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-vdc_ward-holder" class=" ">
                                            <input id="ctrl-vdc_ward" data-field="vdc_ward"  value="<?php  echo $data['vdc_ward']; ?>" type="number" placeholder="Enter Vdc Ward" step="any"  required="" name="vdc_ward"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="present_address">Present Address <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-present_address-holder" class=" ">
                                            <input id="ctrl-present_address" data-field="present_address"  value="<?php  echo $data['present_address']; ?>" type="text" placeholder="Enter Present Address"  required="" name="present_address"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="present_ward">Present Ward <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-present_ward-holder" class=" ">
                                            <input id="ctrl-present_ward" data-field="present_ward"  value="<?php  echo $data['present_ward']; ?>" type="number" placeholder="Enter Present Ward" step="any"  required="" name="present_ward"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="rapd">Rapd <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-rapd-holder" class=" ">
                                            <input id="ctrl-rapd" data-field="rapd"  value="<?php  echo $data['rapd']; ?>" type="number" placeholder="Enter Rapd" step="0.1"  required="" name="rapd"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="sqm">Sqm <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-sqm-holder" class=" ">
                                            <input id="ctrl-sqm" data-field="sqm"  value="<?php  echo $data['sqm']; ?>" type="number" placeholder="Enter Sqm" step="0.1"  required="" name="sqm"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="length_m">Length M <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-length_m-holder" class=" ">
                                            <input id="ctrl-length_m" data-field="length_m"  value="<?php  echo $data['length_m']; ?>" type="number" placeholder="Enter Length M" step="0.1"  required="" name="length_m"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="breadth_m">Breadth M <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-breadth_m-holder" class=" ">
                                            <input id="ctrl-breadth_m" data-field="breadth_m"  value="<?php  echo $data['breadth_m']; ?>" type="number" placeholder="Enter Breadth M" step="0.1"  required="" name="breadth_m"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="east">East <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-east-holder" class=" ">
                                            <input id="ctrl-east" data-field="east"  value="<?php  echo $data['east']; ?>" type="text" placeholder="Enter East"  required="" name="east"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="west">West <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-west-holder" class=" ">
                                            <input id="ctrl-west" data-field="west"  value="<?php  echo $data['west']; ?>" type="text" placeholder="Enter West"  required="" name="west"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="north">North <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-north-holder" class=" ">
                                            <input id="ctrl-north" data-field="north"  value="<?php  echo $data['north']; ?>" type="text" placeholder="Enter North"  required="" name="north"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="south">South <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-south-holder" class=" ">
                                            <input id="ctrl-south" data-field="south"  value="<?php  echo $data['south']; ?>" type="text" placeholder="Enter South"  required="" name="south"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="projectid">Projectid <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-projectid-holder" class=" ">
                                            <input id="ctrl-projectid" data-field="projectid"  value="<?php  echo $data['projectid']; ?>" type="number" placeholder="Enter Projectid" step="any"  required="" name="projectid"  class="form-control " />
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
