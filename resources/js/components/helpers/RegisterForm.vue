<template>
    

                    <form>
                        <csrf />
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input class="form-control" placeholder="Enter name.." type="text" name="name" v-model="user.name" required autocomplete="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input class="form-control" placeholder="Enter email.." type="email" name="email" v-model="user.email" required autocomplete="email">                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input type="password" placeholder="Enter password" class="form-control" name="password" v-model="user.password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Password Confirm</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" v-model="user.password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
</template>
<script>

import csrf from './csrf'
export default{
    
    name:'RegisterForm',
    props:{
        user:{
            required: false,
            default: () => ({})
        }
    },
    components:{
        'csrf':csrf
    },
    
    data(){
        return {
           
        }
    },
    methods:{
       
    },
    mounted(){
        console.log('Mounted register');
    }
}

</script>