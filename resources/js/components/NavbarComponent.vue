<template>
    <div class="nav navbar bg-info">
        <!-- <div class="navbar">
            <a style="text-decoration:none;color:white;" href="articles">Articles</a>
        </div>
        <div class="navbar">
            <a style="text-decoration:none;color:white;" href="users">Users</a>
        </div> -->
        <div v-for="(tab) in navtabs"
                            :key="tab.name" class="navbar">
            <a style="text-decoration:none;color:white;" :href="tab.url">{{tab.name}}</a>
        </div>
    </div>
</template>

<script>

export default{
    name:'navbar',
    props:{

    },
    data(){
        return{   
            navtabs:[
                {
                    name:'Articles',
                    url:'articles'
                },
                {
                    name:'Users',
                    url:'users'
                }
            ],
            tab:{
                name:'',
                url:''
            }
        }
    },
    mounted(){
        console.log(this.navtabs);
    }
}

</script>
