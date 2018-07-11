<template>
    <div>
        <h2>{{ welcome }}</h2>
        <br><br>
        <button @click="get">Submit</button>
    </div>

</template>

<script>
    export default {
        name: "Welcome",

        props: ['reply'],
        // created() {
        //     axios.get('/')
        //         .then(response =>{
        //             console.log(response);
        //             //console.log(this.reply);
        //         })
        //         .catch((error) => {
        //             console.log(error);
        //
        //         })
        // },
        methods: {
            get() {
                axios.get('/tw')
                    .then(response =>{
                        console.log(response);
                        //console.log(this.reply);
                    })
                    .catch((error) => {
                        console.log(error);

                    })
            }
        },
        computed: {
            welcome() {
                return this.$store.getters.welcome;
            }
        }
    }


    //     http://t.co/25U0Cubsd2
</script>

<style scoped>

</style>