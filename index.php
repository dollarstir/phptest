<?php
require_once 'loader/autoloader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Cleaning Service</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/core.css">
</head>
<body>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="margin:30px ;" id="openModalButton">
  Launch Car Modal
</button>
    <div class="modal fade" id="carModal" tabindex="-1" aria-labelledby="carModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg car-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carModalLabel">Select Cleaning Option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="carModalBodyContent">
                    <div class="container-fluid">
                    <div class="row">
            <div class="col-12">
                <h5>Saved Cars</h5>
                <div class="list-group">
                    <!-- Dummy saved cars -->
                    <?php
                    $cars = CarModel::getCars();
                    foreach ($cars as $car) {
                        echo '<a href="#" class="list-group-item list-group-item-action">';
                        
                        if (!empty($car['image'])) {
                            $imagePath = 'assets/images/' . htmlspecialchars($car['image']); 
                            echo '<img src="' . $imagePath . '" alt="Car Image" style="width: 100px; height: auto; float: left; margin-right: 15px;">';
                        }
                        echo '<h5 class="mb-1">' . htmlspecialchars($car['brand_name']) . ' ' . htmlspecialchars($car['model']) . '</h5>';
                        echo '<p class="mb-1">Plate Number: ' . htmlspecialchars($car['license_plate']) . '</p>';
                        echo '<small>Color: <span style="display: inline-block; width: 18px; height: 18px; background-color:#' . htmlspecialchars($car['color_hex']) . '; margin: 0; padding: 0; border: 1px solid #000;"></span> ' . htmlspecialchars($car['color_name']) . '</small>';
                        echo '<br><small>Vehicle Type: ' . htmlspecialchars($car['vehicle_type']) . '</small>';
                        echo '</a>';
                        echo '<div style="clear: both;"></div>'; 
                    }
                    ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h5>Add New Car</h5>
                <form id="addCarForm">
                    <div class="form-group">
                        <label for="carBrand">Car Brand *</label>
                        <select class="form-control" id="carBrand" name="carBrand">
                            <option value="">Select Brand *</option>
                            <?php
                            $carBrands = CarModel::getCarBrands();
                            foreach($carBrands as $brand) {
                                echo "<option value='{$brand['id']}'>{$brand['brand_name']}</option>";
                            }
                            ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="carModel">Car Model</label>
                        <select class="form-control" id="carModel" name="carModel">
                            <option value="">Select Model</option>
                            <!-- Options will be added here based on the brand selected -->
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="carYear">Car Year</label>
                        <input type="text" class="form-control" id="carPlateNumber" placeholder="Enter Car  Year *" required name="carYear">
                        <!-- hidden input to add car -->
                        <input type="hidden" name="action" value="addCar">
                    </div>
                    <div class="form-group">
                        <label for="carColor">Car Color</label>
                        <select class="form-control" id="carColor" name="carColor">
                            <option value="">Select Color</option>
                            <?php
                            $colors = CarModel::getColors();
                            foreach($colors as $color) {
                                echo "<option value='{$color['id']}'>{$color['Name']}</option>";
                            }
                            ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="carPlateNumber">Plate Number</label>
                        <input type="text" class="form-control" id="carPlateNumber" placeholder="Enter Plate Number" name="carPlate">
                    </div>


                    <div class="form-group">
                        <label for="carImage">Browse Car Image</label>
                        <input type="file" class="form-control" id="carImage" name='imgCar'>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Add Car</button>
                </form>
            </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/core.js"></script>
</body>
</html>
