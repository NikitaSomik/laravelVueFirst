<template>
    <div class="container">
        <div class="google-map" :id="name"></div>
    </div>
</template>

<script>
    export default {
        name: 'google-map',
        props: ['name'],
        data: function () {
            return {
                map: null,
                // markers: {
                //     position: {
                //         latitude: 59.93,
                //         longitude: 30.32
                //     }
                // }
                markers: [],
                startLocation:{lat: 37.769, lng: -122.446}
            }
        },
        methods: {
            // Adds a marker to the map and push to the array.
            addMarker(location) {
                let marker = new google.maps.Marker({
                    position: location,
                    map: this.map
                });
                this.markers.push(marker);
            },
            addCircle(locCircle) {
                var cityCircle = new google.maps.Circle({
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35,
                    map: this.map,
                    center: this.startLocation,
                    //radius: Math.sqrt(this.startLocation) * 100
                    radius: 1000
                });

                cityCircle.bindTo('center', locCircle, 'position');
            },

            // Sets the map on all markers in the array.
            setMapOnAll(map) {
                for (let i = 0; i < this.markers.length; i++) {
                    (this.markers[i]).setMap(map);
                }
            },

            // Removes the markers from the map, but keeps them in the array.
            clearMarkers() {
                this.setMapOnAll(null);
            },

            // Shows any markers currently in the array.
            showMarkers() {
                this.setMapOnAll(this.map);
            },

            // Deletes all markers in the array by removing references to them.
            deleteMarkers() {
                this.clearMarkers();
                this.markers = [];
            },
            initMap() {
                this.map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: this.startLocation,
                    mapTypeId: 'terrain'
                });

                (this.map).addListener('click', (event)=>{
                    this.deleteMarkers();
                    this.addMarker(event.latLng);
                });

                this.addMarker(this.startLocation);

               //for (var marker in this.markers) {
                    // Add the circle for this city to the map.

                //circle.bindTo('center', this.markers, 'position');

                //}

                this.addCircle(this.markers[0]);
            },
        },

        computed: {

        },
        mounted: function () {
            this.initMap()
            // /*eslint-disable */
            // const element = document.getElementById(this.name)
            // const options = {
            //     zoom: 14,
            //     center: new google.maps.LatLng(59.93, 30.32),
            //     mapTypeId: google.maps.MapTypeId.ROADMAP
            // }
            // this.map = new google.maps.Map(element, options)
            //
            // let map = this.map;
            //
            // google.maps.event.addListener(this.map, 'click', function (event) {
            //
            //     // this.markers = new google.maps.Marker({
            //     //     position: {
            //     //         lat: 0,
            //     //         lng: 0
            //     //     },
            //     //     map: map,
            //     //     draggable: true
            //     // });
            //     getMarkers(this.markers)
            //     //setMapOnAll(null);
            //
            //     // if (map) {
            //     //     //this.markers.$set()
            //     //    // this.markers.set(map, null)
            //     //
            //     // } else {
            //         let lng = event.latLng.lng();
            //         let lat = event.latLng.lat();
            //
            //         this.markers = new google.maps.Marker({
            //             position: {
            //                 lat: lat,
            //                 lng: lng
            //             },
            //             map: map,
            //             draggable: true
            //         });
            //     console.log(this.markers.position.lat())
            //         //console.log(this.markss.map.center.lat())
            //     //}
            // })

        },
        watch: {

        }

    }









    // methods: {
    //     placeMarker: function(location) {
    //         if (marker) {
    //             //if marker already was created change positon
    //             this.marker.setPosition(location);
    //         } else {
    //             //create a marker
    //             this.marker = new google.maps.Marker({
    //                 position: location,
    //                 map: map,
    //                 draggable: true
    //             });
    //         }
    //     },
    //     initialize: function() {
    // var centerPosition = new google.maps.LatLng(38.713107, -90.42984);
    // var options = {
    //         zoom: 6,
    //     center: centerPosition,
    //         mapTypeId: google.maps.MapTypeId.ROADMAP
    //     };
    //     map = new google.maps.Map($('#map')[0], options);
    //
    //     google.maps.event.addListener(map, 'click', function (evt) {
    //         placeMarker(evt.latLng);
    // });
    //     }
    // },
</script>

<style>
    .google-map {
        width: 640px;
        height: 480px;
        margin: 0 auto;
        background: gray;
    }
</style>