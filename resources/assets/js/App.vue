<template>
    <div>


        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <!-- Brand -->
            <a class="navbar-brand" href="#">Navbar</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!--<a class="nav-link" href="#">Link</a>-->
                        <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link> |
                        <router-link class="nav-link" :to="{ name: 'login' }">Login</router-link>
                        <router-link class="nav-link" :to="{ name: 'register' }">Register</router-link>
                    </li>

                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       // name: "App.vue"
    }
</script>

<style scoped>

</style>