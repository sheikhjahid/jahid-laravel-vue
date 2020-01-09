<template>
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                    <div class="card-body">
                        <login-form method="POST" :action="'login'"></login-form>
                    </div>
            </div>
    </div>
</div>
</template>
<script>

import LoginForm from './helpers/LoginForm'
export default{
    name:'login',
    components:{
        'login-form':LoginForm
    },
    methods:{

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