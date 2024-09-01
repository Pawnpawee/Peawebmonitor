<div class="card mt-4 lg:ml-64" wire:init="getData()">
    <div id="map" class="w-full h-[800px] fixed" wire:ignore></div>
</div>

@push('scripts')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('pea.google_map.key') }}"></script>
    <script>
        window.addEventListener("load", function() {
            initMap();
        });

        document.addEventListener('GoogleMapRender', function (ev){
            console.table(ev.detail.transformers);
            drawPath(ev.detail.transformers);
        });

        let map, bounds;
        function initMap() {
            var mapOptions = {
                zoom: 9,
                center: new google.maps.LatLng(@js( $lat ), @js( $lng )),
                mapTypeId: google.maps.MapTypeId.HYBRID
            };

            map = new google.maps.Map(document.getElementById('map'), mapOptions);
        }

        function drawPath(transformers){
            bounds = new google.maps.LatLngBounds();
            for (let i in transformers) {
                drawCircle(transformers[i]);
            }
        }

        function drawCircle(transformer){
            let location = new google.maps.LatLng(transformer.latitude, transformer.longitude);
            let marker = new google.maps.Marker({
                position: location,
                sName: transformer.name,
                map: map,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 8.5,
                    fillColor: "#F00",
                    fillOpacity: 1,
                    strokeWeight: 0.4
                },
            });

            google.maps.event.addListener(marker, 'click', function() {
                let infowindow = new google.maps.InfoWindow();
                infowindow.setContent('<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"><svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z"/></svg><h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">'+transformer.name+'</h5><a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">ดูรายละเอียด</a></div>');
                infowindow.open(map, marker);
            });

            bounds.extend(location);
            map.fitBounds(bounds);
        }
    </script>
@endpush