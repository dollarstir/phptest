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
            $sql = "INSERT INTO cars (brand, model, year, price, image) VALUES (?, ?, ?, ?, ?)";
            if((new Query())->insert($sql, $data)) {
                return ['status' => 'success', 'message' => 'Car added successfully'];
            }
        } catch (Throwable $th) {
            ExceptionHandler::handleException($th);
        }
    }
    
}