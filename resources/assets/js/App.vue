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
                    <template v-if="this.checkUser">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
                    </li>
                    </template>
                    <template v-else>
                        <li>
                            <router-link class="nav-link" :to="{ name: 'login' }">Login</router-link>
                        </li>
                        <li>
                            <router-link class="nav-link" :to="{ name: 'register' }">Register</router-link>
                        </li>
                    </template>
                        <!--<router-link class="nav-link" :to="{ name: 'welcome' }">Welcome</router-link>-->
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            User<span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">
                               <!--onclick="event.preventDefault();-->
                                                     <!--document.getElementById('logout-form').submit();">-->
                                <!--{{ __('Logout') }}-->
                            Logout
                            </a>

                            <!--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">-->
                                <!--@csrf-->
                            <!--</form>-->
                        </div>
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
            <div class="row">
                <!--<google-map :name="name"></google-map>-->
            </div>
        </div>
    </div>
</template>

<script>

    //import Admin from './components/Admin.vue'

    export default {
        // name: "App.vue"
        computed: {
            checkUser: function () {
                return localStorage.getItem('token')
            }
        }
        //     data: function () {
        //         return {
        //             name: 'map'
        //         }
        //     },
        //     mounted: function () {
        //     },
        //     components: {Admin}
        //
    }
</script>

<style scoped>

</style>