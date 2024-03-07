
        $(document).ready(function() {

                $("#openModalButton").click(function() {
                    $("#carModal").modal('show');
                 });

        
            // Submit form data to add a new car
            $('#addCarForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: 'core/actions.php', 
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    
                    success: function(response) {
                        alert('Car added successfully');
                        $('#carModal').modal('hide');
                        window.location.reload();
                        
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




              // Load car models based on the selected brand

            $('#carBrand').change(function() {
        var brand = $(this).val(); // Get the selected brand
        $('#carModel').html('<option value="">Select Model</option>'); // Clear previous options
        
        if(brand) {
            $.ajax({
                url: 'core/actions.php', 
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
