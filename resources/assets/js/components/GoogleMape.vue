<template>
    <div class="container">
        <div class="google-map" :id="name"></div>
        <button @click="sendParam">Submit</button>
    </div>
</template>

<script>
    export default {
        name: 'google-map',
        props: ['name'],
        data: function () {
            return {
                map: null,
                markers: [],
                cityCircle: [],
                startLocation: {
                    lat: 37.769,
                    lng: -122.446
                },
                loc: {
                    lat: null,
                    lng: null
                },
                radiusCircle: null
            }
        },
        methods: {
        //     activities.addEventListener("change", function() {
        //     if(activities.value == "addNew")
        //     {
        //         addActivityItem();
        //     }
        // });

            sendParam() {
                axios.post('/tw', {
                        lat: this.loc.lat,
                        lng: this.loc.lng,
                        radius: this.radiusCircle.getRadius()
                })
                .then((response) => {
                    if (response.status == '200') {

                        console.log(response);
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            // Adds a marker to the map and push to the array.
            addMarker(location) {
                let marker = new google.maps.Marker({
                    position: location,
                    map: this.map
                });
                this.markers.push(marker);
               // console.log(location.lat());
                this.loc.lat = location.lat();
                this.loc.lng = location.lng();
            },
            addCircle(locCircle) {

                let cityCirc = new google.maps.Circle({
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35,
                    editable: true,
                    map: this.map,
                    center: this.startLocation,
                    //radius: Math.sqrt(this.startLocation) * 100
                    radius: 1000
                });

                this.cityCircle.push(cityCirc);
                this.radiusCircle = cityCirc;
                //console.log(cityCirc.getRadius());
                cityCirc.bindTo('center', locCircle, 'position');
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
            clearCircle(map) {
                for (let i = 0; i < this.cityCircle.length; i++) {
                    (this.cityCircle[i]).setMap(map);

                }
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
            deletCircle() {
                this.clearCircle(null);
                this.cityCircle = [];

            },

            initMap() {
                this.map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: this.startLocation,
                    mapTypeId: 'terrain'
                });

                (this.map).addListener('click', (event)=>{
                    this.deleteMarkers();
                    this.deletCircle();
                    //console.log(event.latLng.lat());
                    //console.log(event.latLng.lng());
                    this.addMarker(event.latLng);
                    this.addCircle(this.markers[0]);

                });

               // this.addMarker(this.startLocation);

            }
//this.cityCircle.getRadius()
        },
        computed: {},
        mounted: function () {
            this.initMap()
        },
        watch: {

        }

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