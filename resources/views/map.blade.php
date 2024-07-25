<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Autocomplete with Google Places</title>
        <style>
            .pac-container {
                z-index: 1051 !important;
                /* Ensure autocomplete dropdown appears above other elements */
            }
        </style>
    </head>

    <body>
        <div class="col mb-3">
            <label for="start_loc" class="form-label">Start Location</label>
            <input type="text" class="form-control @error('start_loc') is-invalid @enderror" id="start_loc"
                name="start_loc" value="{{ old('start_loc') }}" required />
            @error('start_loc')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv13DD7H-OxQrCSV7sE5Nc7IrNt9c0G04&libraries=places">
        </script>
        <script>
            function initAutocomplete() {
                const input = document.getElementById('start_loc');
                const autocomplete = new google.maps.places.Autocomplete(input, {
                    types: ['geocode']
                });

                autocomplete.addListener('place_changed', function() {
                    const place = autocomplete.getPlace();
                    console.log('Selected place:', place);
                    input.value = place.formatted_address || place.name;
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                initAutocomplete();
            });
        </script>
    </body>
</html>
