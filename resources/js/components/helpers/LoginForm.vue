<template>

<form>
                        <csrf />

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" v-model="user.email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" v-model="user.password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" v-model="user.remember">

                                    <label class="form-check-label" for="remember">
                                       Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Login
                                </button>
                                <a class="btn btn-link" :href="'forgot-password'">
                                    Forgot Password
                                </a>
                            </div>
                        </div>
                    </form>

</template>
<script>
import csrf from './csrf'
export default{
    name:'login-form',
    components:{
        'csrf':csrf
    },
    props:{
        user:{
            required: false,
            default: () => ({})
        }
    },
    data(){
        return{

        }
    },
    mounted(){
        console.log('Login form mounted')
    }
}
</script>