<template>
    <div class="container sci" style=" margin-top:30px; ">
        <div class="row">
            <div class="col align-self-center">

                <div class="card" >
                    <div class=" card-header center">Register</div>

                    <div class="card-body" >

                        <form >
                            <div class="form-group row">
                                <label class="sr-only" for="email">Name</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name"
                                           v-model="loginDetails.name"
                                           placeholder="Full name. e.g(John Doe Smith)">
                                    <span v-if="errors.name" class="help-block">
                                <p class="danger" v-for="item in errors.name"> {{item}}</p>

                            </span>

                                </div>
                            </div>





                            <div class="form-group row">
                                <label class="sr-only" for="email">Email</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email"
                                           v-model="loginDetails.email"
                                           placeholder="Email">
                                    <!--<span v-if="errorsEmail" class="help-block">-->

                                <!--<strong> {{emailError}}</strong>-->
                            <!--</span>-->
                                    <span v-if="errors.email" class="help-block">
                                <p class="danger" v-for="item in errors.email"> {{item}}</p>

                            </span>

                                </div>
                            </div>


                            <div class="form-group row" >
                                <label class="sr-only" for="password">Password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-lock-filled"></i></div>
                                    </div>
                                    <input type="password" v-validate="'required'" ref="password" class="form-control"
                                           id="password"
                                           name="password"
                                           v-model="loginDetails.password"
                                           placeholder="Password">
                                    <!--<span v-if="errorsPassword" class="help-block">-->
<!--<strong>{{passwordError}}</strong>-->


                            <!--</span>-->
                                    <span v-if="errors.password" class="help-block">
                                <p class="danger" v-for="item in errors.password"> {{item}}</p>

                            </span>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="sr-only" for="password_confirmation">Confirm Password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-lock-filled"></i></div>
                                    </div>
                                    <input v-validate="'required|confirmed:$password'" type="password"
                                           class="form-control" id="password_confirmation"
                                           name="password_confirmation"
                                           v-model="loginDetails.password_confirmation"
                                           placeholder="Confirm Password" >
                                    <!--<span v-if="errorsConPassword" class="help-block">-->
<!--<strong>{{conpasswordError}}</strong>-->


                            <!--</span>-->
                                    <span v-if="errors.password_confirmation" class="help-block">
                                <p class="danger" v-for="item in errors.password_confirmation"> {{item}}</p>

                            </span>
                                </div>
                            </div>





                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" @click.prevent="registerPost" class="btn btn-primary">Sign Up
                                    </button>
                                </div>
                            </div>


                            <router-link class="btn btn-link" to="/login">
                                <strong>Login</strong>
                            </router-link>

                        </form>



                    </div>


                </div>





            </div>
        </div>







    </div>























</template>

<script>
    export default {
        data() {

            return {
                loginDetails: {
                    name:'',
                    email : '',
                    password:'',
                    password_confirmation: ''
                },
                errors : {}
            }

        },
        methods:{
            registerPost(){
                let vm = this
                let errors = {}
                axios.post('/formSubmit', vm.loginDetails)
                    .then(function(response){

                    console.log(response)

                }).catch(function(error){
                    vm.errors = error.response.data.errors
                    var errors = error.response;
                    console.log(errors)
                    if(errors.statusText === 'Unprocessable Entity'  || errors.status === 422){

                        if(errors.data){
                            if(errors.data.email){

                                vm.errorsEmail = true;
                                vm.emailError = _.isArray(errors.data.email) ? errors.data.email[0]: errors.data.email;

                            }
                            if(errors.data.password){

                                vm.errorsPassword = true;
                                vm.passwordError = _.isArray(errors.data.password) ? errors.data.password[0] :
                                    errors.data.password;
                            }

                        }


                    }

                });

            }

        },
        mounted() {

            console.log('Component mounted')

        }


    }




</script>