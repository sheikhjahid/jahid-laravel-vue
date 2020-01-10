<template>
    <div class="container">
        <div class="card">
            <div class="card-header">Article Details</div>
            <div class="card-body">{{ article.name }}</div>
            <div class="card-body">{{ article.description }}</div>

            <div v-if="article.image" class="card-body">
                <img :src="'storage/'+article.image" width="400px" height="400px">
            </div>
            
        </div>
    </div>
</template>
<script>
export default{
    name:'view-article',
    props:{
        article:{
            type:Object,
            required:true,
            default:() => ({})
        }
    },
    data(){
        return {

        }
    },
    methods:{

    },
    mounted(){
        console.log(this.article);
    }
}
</script>