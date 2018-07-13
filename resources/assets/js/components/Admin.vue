<template>
    <div>
        <h2>Hello</h2>
        <google-map :name="name"></google-map>


    </div>

</template>

<script>
    import googleMap from './GoogleMape'

    export default {
        data: function () {
            return {
                name: 'map',
            }
        },
        methods: {
            // sendParam() {
            //     console.log(window);
            // }
        },
        mounted: function () {
        },
        components: {googleMap}
    }
</script>
<style scoped>
</style>