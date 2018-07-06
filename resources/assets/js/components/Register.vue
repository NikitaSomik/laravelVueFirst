<template>
    <div class="sign-up">
        <div class="card-body">
            <form method="POST" action="" v-on:submit.prevent="signUp">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" v-model="register.name" required autofocus  v-bind:class="{ 'is-invalid': register.error && register.errors.name }">
                        <span class="invalid-feedback" role="alert">{{ register.errors.name ? register.errors.name[0] : ''}}</span>
                    </div>
                </div>
                <!--v-bind:class="{ 'invalid-feedback': register.error && register.errors.email }-->
                <!--<div class="form-group row" v-bind:class="{ 'invalid-feedback': register.error && register.errors.email }">-->
                    <!--<label class="col-md-4 col-form-label text-md-right">Email</label>-->
                    <!--<div class="col-md-6">-->
                        <!--&lt;!&ndash;<div v-if="register.error">&ndash;&gt;-->
                            <!--<input id="email" type="email" class="form-control" v-model="register.email" required>-->
                            <!--<span class="invalid-feedback" role="alert" v-if="register.error && register.errors.email">{{ register.errors.email }}</span>-->
                        <!--&lt;!&ndash;</div>&ndash;&gt;-->
                    <!--</div>-->
                <!--</div>-->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                        <!--<div v-if="register.error">-->
                        <input id="email" type="email" class="form-control" v-model="register.email" required  v-bind:class="{'is-invalid': register.error && register.errors.email }">
                        <div class="invalid-feedback">{{ register.errors.email ? register.errors.email[0] : ''}}</div>
                        <!--</div>-->
                    </div>
                </div>
                <!--<div class="form-group row">-->
                    <!--<label for="password" class="col-md-4 col-form-label text-md-right" v-bind:class="{ 'invalid-feedback': register.error && register.errors.password }">Password</label>-->
                    <!--<div class="col-md-6">-->
                        <!--<input id="password" type="password" class="form-control" v-model="register.password" required>-->
                        <!--<span class="invalid-feedback" role="alert" v-if="register.error && register.errors.password">{{ register.errors.password }}</span>-->
                    <!--</div>-->
                <!--</div>-->
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" v-model="register.password" required  v-bind:class="{ 'is-invalid': register.error && register.errors.password }">
                        <span class="invalid-feedback" role="alert">{{ register.errors.password ? register.errors.password[0] : '' }}</span>
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
                        //console.log(1, response);
                        //router.go('/')
                        //window.location.href = "http://localhost/";
                        // if (!response.ok) {
                        //     //console.log(response[0]);
                        // }

                    })
                    .catch((error) => {
                        //return error.response.data.errors;
                        this.register.errors = error.response.data.errors;
                        this.register.error = true;
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