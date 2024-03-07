
        $(document).ready(function() {

                $("#openModalButton").click(function() {
                    $("#carModal").modal('show');
                 });

            // Load car models based on the selected brand
            $('#car_brands').change(function() {
                var brandId = $(this).val();
                $.ajax({
                    url: 'getCarModels.php', // Adjust the URL as per your project structure
                    type: 'POST',
                    data: {brand: brandId},
                    dataType: 'json',
                    success: function(data) {
                        $('#car_models').html('<option value="">Select Car Model *</option>');
                        $.each(data, function(key, value) {
                            $('#car_models').append('<option value="' + value.id + '">' + value.model + '</option>');
                        });
                    }
                });
            });

            // Submit form data to add a new car
            $('#addCarForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: 'addCar.php', // Adjust the URL as per your project structure
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert('Car added successfully');
                        $('#carModal').modal('hide');
                        // Optionally, refresh the saved cars list
                    },
                    error: function() {
                        alert('Error adding car');
                    }
                });
            });

            // Customize input file label to show selected file name
            $('.custom-file-input').on('change', function() {
                var fileName = $(this).val().split('\\').pop();
                $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
            });




            // selection brand  to get car model

            $('#carBrand').change(function() {
        var brand = $(this).val(); // Get the selected brand
        $('#carModel').html('<option value="">Select Model</option>'); // Clear previous options
        
        if(brand) {
            $.ajax({
                url: 'core/actions.php', // Adjust the URL to your actual PHP script
                type: 'POST',
                data: {brand: brand, action: 'getModels'},
                dataType: 'json',
                success: function(response) {
                    $.each(response, function(index, model) {
                        $('#carModel').append(new Option(model.model, model.id));
                    });
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        }
    });
        });
