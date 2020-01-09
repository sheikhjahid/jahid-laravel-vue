<template>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <register-form method="POST" :action="'register'"></register-form>
                 </div>
            </div>
        </div>
    </div>

</template>
<script>
import RegisterForm from './helpers/RegisterForm.vue'
export default{
    name:'Register',
    components:{
        'register-form':RegisterForm
    },
    data(){
        return {

        }
    },
    methods:{

    },
    mounted()
    {
        console.log('register component loaded');
    }
}
</script>