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
                map: '',
                 markers: {}
                // [
                //     {
                //         position: {
                //             latitude: 59.93,
                //             longitude: 30.32
                //         }
                //     },
                //
                // ]
            }
        },
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
        computed: {
            // mapMarkers: function () {
            //     return this.markers
            // }
        },
        mounted: function () {
            /*eslint-disable */
            const element = document.getElementById(this.name)
            const options = {
                zoom: 14,
                center: new google.maps.LatLng(59.93, 30.32)
            }
            this.map = new google.maps.Map(element, options)
                //
                // this.markers.forEach((marker) => {
                //     const position = new google.maps.LatLng(marker.position.latitude, marker.position.longitude)
                //     marker.map = this.map
                //     marker.position = position
                //     new google.maps.Marker(marker)
                // })

            google.maps.event.addListener(this.map, 'click', function (evt) {
                //this.placeMarker(evt.latLng)
                //console.log(this.placeMarker());
                this.placeMarker(evt)
            })

        },
        methods: {
             placeMarker (location) {
            //     if (this.markers) {
            //     //if marker already was created change positon
            //         this.markers.setPosition(location);
            //     } else {
            // //create a marker
            //     this.markers = new google.maps.Marker({
            //         position: location,
            //         map: map,
            //         draggable: true
            //     });
            //     }
                 console.log(location);
             }
        }
        //google.maps.event.addDomListener(window, 'load', this.initialize);

    }

</script>

<style>
    .google-map {
        width: 640px;
        height: 480px;
        margin: 0 auto;
        background: gray;
    }
</style>