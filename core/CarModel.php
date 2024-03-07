<?php
class CarModel
{

    // function to get car models by brand
    public static function getCarModels($brandId): array
    {
        ExceptionHandler::setUpErrorHandler();
        try {
            $sql = "SELECT id, model FROM car_models WHERE brand_name = ?";
            return (new Query())->fetchAll($sql, [$brandId]);
        } catch (Throwable $th) {
            ExceptionHandler::handleException($th);
        }
    }

    // function to get all car brands
    public static function getCarBrands(): array
    {
        ExceptionHandler::setUpErrorHandler();
        try {        
            $sql = "SELECT * FROM car_brands";
            return (new Query())->fetchAll($sql);
        } catch (Throwable $th) {
            ExceptionHandler::handleException($th);
        }
    }

    // function to  get all colors
    public static function getColors(): array
    {
        ExceptionHandler::setUpErrorHandler();
        try {
            $sql = "SELECT * FROM colors";
            return (new Query())->fetchAll($sql);
        } catch (Throwable $th) {
            ExceptionHandler::handleException($th);
        }
    }

    // function to add a new car

    // 
    public static function addCar($data): array
    {
   
        ExceptionHandler::setUpErrorHandler();
        try {


            extract($data);
            
            // Handle file upload (simplified for example purposes)
            $targetDir = __DIR__ . "/../assets/images/";
            $fileName = basename($_FILES["imgCar"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            if(move_uploaded_file($_FILES["imgCar"]["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO client_cars (client_id,brand_name, model, year,color,license_plate, image,timestamp) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
                if((new Query())->insert($sql, [1,$carBrand, $carModel, $carYear, $carColor, $carPlate, $fileName,date('Y-m-d H:i:s')])) {
                    return ['status' => 'success', 'message' => 'Car added successfully'];
                } else {
                    return ['status' => 'error', 'message' => 'Error adding car'];
                }
                // File upload success
            } else {
                return ['status' => 'error', 'message' => 'Error uploading image'];
            }
           
        } catch (Throwable $th) {
            ExceptionHandler::handleException($th);
        }
    }


    // function to get all cars
    public static function getCars(): array
    {
        ExceptionHandler::setUpErrorHandler();
        try {
            $sql = "SELECT cc.id, cb.brand_name, cm.model, cm.vehicle_type, cc.year, c.Name AS color_name, c.Hex AS color_hex, cc.license_plate, cc.image
            FROM client_cars cc
            JOIN car_brands cb ON cc.brand_name = cb.id
            JOIN car_models cm ON cc.model = cm.id
            JOIN colors c ON cc.color = c.id
            WHERE cc.client_id = ?";
            return (new Query())->fetchAll($sql, [1]);
        } catch (Throwable $th) {
            ExceptionHandler::handleException($th);
        }
    }
    
}