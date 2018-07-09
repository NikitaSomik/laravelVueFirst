<template>
    <div>
        <div class="alert alert-danger" v-if="login.error">
            <span>There was an error, unable to sign in with those credentials.</span>
        </div>
        <div class="card-body">
            <form method="POST" action="" v-on:submit.prevent="auth">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" v-model="login.email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" v-model="login.password">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return {
                login: {
                    email                : '',
                    password             : '',
                    error: false,
                    success: false
                },
            }
        },
        methods: {
            auth(){
                axios.post('/api/auth/login', this.login)
                    .then((response) => {
                        if (response.status == '200') {
                            this.$router.push('/')
                        }
                    })
                    .catch((error) => {
                        this.login.error = true;
                        console.log(this.login.error);

                    })
            },
        }
    }
</script>

<style scoped>

</style>