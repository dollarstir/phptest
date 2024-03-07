        <div class="modal fade" id="carModal" tabindex="-1" aria-labelledby="carModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm car-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="carModalLabel">
                            Select Cleaning Option
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-open" id="carModalBodyContent">
                        <!-- This is an alert modal. -->

                        <div class="row" id="car-section">
                            <div id="car_section_step1">
                                <div class="container cbs-main">
                                    <div class="payment_form">
                                        <form>
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <span id="card-header">Saved cars:</span>
                                                <span id="card-header">Select car:</span>
                                            </div>
                                            <span id="clientCarList">
                                                <?php 
                                                    // retrieve the client_cars and loop
                                                    ?>
                                                        <div class="row row-1">
                                                            <div class="col-2"><img class="img-fluid" src="<?php // echo image; ?>"/></div>
                                                            <div class="col-5">
                                                                <div><?php // brand and model here // "<strong class='fw-bold'>Brand</strong>: "..", <strong class='fw-bold'>Model</strong>: " . ; ?></div>
                                                                <div><?php //plate number here "<strong class='fw-bold'>Plate Number</strong>: " .; ?></div>
                                                                <div><?php // color here // "<strong class='fw-bold'>Color</strong>: "; ?> <span style="display: inline-block; width: 18px; height: 18px; background-color: <?php // color ?>; margin: 0; padding: 0; border: 1px solid #000;"></span></div>
                                                                <span class="hiddenVehicleType" style="display: none;"><?php // vehicle type here; ?></span>
                                                            </div>
                                                            <div class="col-5 d-flex justify-content-center">
                                                                <div class="cbs-button-box btn_select_car" style="margin: 0px;">
                                                                    <a class="cbs-button" id="client_car_<?php // car id here ?>" href="#" onclick="return false;">Select Car</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php
                                                            // if no cars were added then
                                                    ?>
                                                        <div class="row row-1">
                                                            No Cars Added
                                                        </div>
                                                    <?php
                                                        // end if 
                                                    ?>

                                            </span>

                                            <span id="add_new_car_section">
                                                <span id="card-header">Add New Car:</span>

                                                <div class="row">

                                                    <div class="col-lg-6" style="margin-top: 20px;">
                                                        <!-- Move the contents of #brand_section here -->
                                                        <div class="form-group">
                                                            <select class="form-control" id="car_brands" style="width: 100%;">
                                                                <option value="">Select Car Brand *</option>
                                                                <?php
                                                                    // load all car brands in the select
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6" style="margin-top: 20px;">
                                                        <!-- Move the contents of #brand_section here -->
                                                        <div class="form-group">
                                                            <select class="form-control" id="car_models" style="width: 100%;">
                                                                <option value="">Select Car Model *</option>
                                                                <!-- # load all the car models based on which car brand is selected -->
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6" style="margin-top: 20px;">
                                                        <!-- Move the contents of #brand_section here -->
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" id="car_year" style="width: 100%;" placeholder="Enter Car Year *">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6" style="margin-top: 20px;">
                                                        <!-- Move the contents of #brand_section here -->
                                                        <div class="form-group">
                                                            <select class="form-control" id="car_colors" style="width: 100%;">
                                                                <option value="">Select Car Color *</option>
                                                                <?php
                                                                    // load all the colors here
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6" style="margin-top: 20px;">
                                                        <!-- Move the contents of #brand_section here -->
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" id="plate_number" style="width: 100%;" placeholder="Enter Plate Number *">
                                                        </div>

                                                        <div class="form-group vehicle_icon_div" style="margin-top: 20px; display: none;">
                                                            <div class="form-control">
                                                                <div class="cbs-vehicle-icon cbs-vehicle-icon-small-car"></div><div class="cbs-vehicle-icon-name">Regular Size Car</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6" style="margin-top: 20px;">
                                                        <div id="image_section" class="image-div" style="position: relative;">
                                                            <!-- Place your image or content here -->
                                                            <div class="spinner-border text-primary" role="status" id="loading-spinner" style="display: none;">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>

                                                            <!-- Make sure an image can be added when user clicks here -->
                                                            <a href="JavaScript:void(0);" onclick="document.getElementById('imgCar').click(); return false;">
                                                                <img src="assets/images/car_models/default_mini.png" alt="Car Image" class="img-fluid" id="car_model_image" style="opacity: 0.7; width: 100%; height: 100%;">
                                                                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; font-size: 20px; font-weight: bold; z-index: 1; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                                                                    Upload your car *
                                                                </div>
                                                            </a>

                                                            <input type="file" class="form-control" id="imgCar" name="imgCar" onchange="readCar(this);" style="visibility: hidden;" accept="image/x-png, image/gif, image/jpeg, image/jpg"/>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="button-container" style="display: flex; justify-content: space-between; width: 100%;">
                                                    <button class="btn" id="btnCloseCarForm" style="width: 150px; background-color: red;"><b>Cancel</b></button>
                                                    <button class="btn" id="btnAddCar" style="width: 150px;"><b>Add Car</b></button><!-- When add car is click the car detail should be saved to the database -->
                                                </div>

                                            </span>

                                        </form>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer" id="booking_modal_footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>