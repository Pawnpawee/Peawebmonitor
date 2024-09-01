{{-- <div class="card mt-4" wire:init="getData()">
    <button wire:click.prevent="$dispatch('openModal', 'http::add')" class="btn btn-primary">Add</button>
    <button wire:click="openAddModal">Add New Item</button>
    <div id="map" class="w-full h-[1000px] fixed" wire:ignore></div>
</div> --}}

<div class="">
    <!-- Main modal -->
    <div class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 2-50 justify-center items-center w-full md:inset-0">
    <div class="relative p-4 w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
    <!-- Modal header -->
    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600"> ...
    </div>
    <!-- Modal body -->
    ttttttttttttttttttttttttttttttttttt

    </div>

    </div>

    </div>

</div>

@push('scripts')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('pea.google_map.key') }}&callback=initMap"></script>
    <script>
        document.addEventListener('GoogleMapRender', function (ev){
            drawPath();
        });
        
        // function initMap() {
        //     var map = new google.maps.Map(document.getElementById('map'), {
        //         center: {lat: -34.397, lng: 150.644},
        //         zoom: 8
        //     });
        // }

        var map, infoWindow;

        function initMap() {
            var mapOptions = {
                zoom: 8,
                center: new google.maps.LatLng(-34.397, 150.644),
                // mapTypeId: google.maps.MapTypeId.TERRAIN
            };

            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            //drawPath();
        }

        function drawPath(){
            if(!map) return true;

            var bounds = new google.maps.LatLngBounds();
            var polygons = [];
            var arr = new Array();
            var colors = ['#FF0000', '#00FF00', '#FF8000'];
            var coordinates = {
            "line1": [
                [ 37.772, -122.214 ],
                [ 21.291, -157.821 ],
                [ -18.142, 178.431 ],
                [ -27.467, 153.027 ],
            ],

            "line2": [
                [ 47.772, -112.214 ],
                [ 31.291, -147.821 ],
                [ -8.142, 188.431 ],
                [ -17.467, 163.027 ],
            ],

            "line3": [
                [ 57.772, -102.214 ],
                [ 41.291, -137.821 ],
                [ -8.142, 198.431 ],
                [ -7.467, 173.027 ],
            ]
            };
            for (var i in coordinates) {
            arr = [];

            for (var j = 0; j < coordinates[i].length; j++) {
                arr.push(new google.maps.LatLng(
                    parseFloat(coordinates[i][j][0]),
                    parseFloat(coordinates[i][j][1])
                ));
                bounds.extend(arr[arr.length - 1])
            }
            console.log(arr);

            // Construct the polygon.
            polygons.push(new google.maps.Polyline({
                path: arr,
                strokeColor: colors[polygons.length % colors.length],
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: colors[polygons.length % colors.length],
                fillOpacity: 0.35
            }));
            polygons[polygons.length - 1].setMap(map);

            var infowindow = new google.maps.InfoWindow({
                content: "Hello World!"
            });

            google.maps.event.addListener(polygons[polygons.length - 1], 'click', function(event) {
                infowindow.open(map);
                infowindow.setPosition(event.latLng);
            });

            }
            map.fitBounds(bounds);


            //google.maps.event.addListener(arr, 'click', showArrays);
            // infoWindow = new google.maps.InfoWindow();
        }
    </script>
@endpush