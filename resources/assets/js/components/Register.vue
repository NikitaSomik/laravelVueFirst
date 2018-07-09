<template>
    <div class="sign-up">
        <div class="card-body">
            <form method="POST" action="" v-on:submit.prevent="signUp">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" v-model="register.name" required autofocus  v-bind:class="{ 'is-invalid': register.error && register.errors.name }">
                        <span class="invalid-feedback" role="alert" v-for="errorName in register.errors.name">{{ errorName }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" v-model="register.email" required  v-bind:class="{'is-invalid': register.error && register.errors.email }">
                        <div class="invalid-feedback" v-for="errorsEmail in register.errors.email">{{ errorsEmail }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" v-model="register.password" required  v-bind:class="{ 'is-invalid': register.error && register.errors.password }">
                        <p style="margin-bottom: 0px;" class="invalid-feedback" role="alert" v-for="errorsPwd in register.errors.password">{{ errorsPwd }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" v-model="register.password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Register",
        data : function() {
            return {
                listen: false,
                register: {
                    name                 : '',
                    email                : '',
                    password             : '',
                    password_confirmation: '',
                    error: false,
                    errors: {
                        name: null,
                        email: null,
                        password: null,
                        password_confirmation: null
                    },
                    success: false
                },
                errorsName: ['name', 'email', 'password']
            }
        },
        methods:{
            signUp(){
                axios.post('/register', this.register)
                    .then((response) => {

                        console.log(response);
                        //window.location.href = "http://localhost/";
                        if (response.status == '201') {
                            //window.location.href = "http://laravue/";
                            this.$router.push('/login')
                        }
                    })
                    .catch((error) => {
                        //return error.response.data.errors;
                        this.register.errors = error.response.data.errors;
                        console.log(this.register.errors);

                    })
                        // .then((res,rej)=>{
                    //     // console.log(res, rej)
                    //     (this.errorsName).forEach((n)=>{
                    //         this.$set(this.register.errors, n, res[n]);
                    //         this.listen = !this.listen;
                    //     })
                    // });
            }
        },
        watch:{
            // listen(val){
            //     console.log(val)
            // },
            //'register.errors'(value) {
                //this.error = true;

               // console.log(value['email']);
            //}
            // 'register.errors.name'(value) {
            // this.error = true;
            // console.log(value);
            // },
            // 'register.errors.password'(value) {
            // this.error = true;
            // console.log(value[0]);
   // }
        }
    }
</script>

<style scoped>

</style>