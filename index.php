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
                    <a href="#" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Toyota Camry</h5>
                        <p class="mb-1">Plate Number: XYZ1234</p>
                        <small>Color: Red</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Honda Civic</h5>
                        <p class="mb-1">Plate Number: ABC5678</p>
                        <small>Color: Blue</small>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h5>Add New Car</h5>
                <form>
                    <div class="form-group">
                        <label for="carBrand">Car Brand</label>
                        <select class="form-control" id="carBrand">
                            <option value="">Select Brand</option>
                            <?php
                            $carBrands = CarModel::getCarBrands();
                            foreach($carBrands as $brand) {
                                echo "<option value='{$brand['id']}'>{$brand['brand_name']}</option>";
                            }
                            ?>
                            <!-- Add more options here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="carModel">Car Model</label>
                        <select class="form-control" id="carModel">
                            <option value="">Select Model</option>
                            <!-- Options will be added here based on the brand selected -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="carColor">Car Color</label>
                        <select class="form-control" id="carColor">
                            <option value="">Select Color</option>
                            <?php
                            $colors = CarModel::getColors();
                            foreach($colors as $color) {
                                echo "<option value='{$color['id']}'>{$color['name']}</option>";
                            }
                            ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="carPlateNumber">Plate Number</label>
                        <input type="text" class="form-control" id="carPlateNumber" placeholder="Enter Plate Number">
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
