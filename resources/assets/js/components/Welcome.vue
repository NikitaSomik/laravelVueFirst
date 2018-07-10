<template>
    <div>
        <p>Welcome</p>
        <button @click="get"></button>
    </div>

</template>

<script>
    export default {
        name: "Welcome",

        // props: ['reply '],
        // computed: {
        //     decodedData() {
        //         return JSON.parse(this.dataFromPhp );
        //     }
        // },
        // data() {
        //     return {
        //         //message: JSON.parse(this.dataFromPhp)
        //     }
        // },
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
        }
        // computed: {
        //     decodedData() {
        //         return JSON.parse(this.reply );
        //     }
        // }
    }


    //     http://t.co/25U0Cubsd2
</script>

<style scoped>

</style>