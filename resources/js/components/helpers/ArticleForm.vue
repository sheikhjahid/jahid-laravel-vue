<template>
    <form enctype="multipart/form-data" @submit.prevent="addArticle(articleData)"  class="mb-2">
            <!-- <pre>{{articleData}}</pre> -->
            <div class="form-group">
                <input class="form-control" placeholder="Name.." type="text" v-model="articleData.name">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Description.." v-model="articleData.description"></textarea>
            </div>
            <div v-if="!articleData.image" class="form-group">
                <input type="file" v-on:change="onImageChange">
            </div>
             <div v-else class="form-group">
                <img :src="'storage/'+articleData.image" />
                <button @click="removeImage">Remove image</button>
            </div>    
        <button type="submit" class="btn btn-light btn-block">Submit</button>
    </form>
</template>
<script>

export default{
    name: 'ArticleForm',
    props:{
        articleData:{
            type:Object,
            required:true
        }
    },
    data(){
       return  {
            // article:{
            //     id:'',
            //     name:'',
            //     description:'',
            //     image:'',
            // }
        }
    },
    methods:{
        onImageChange(e) {
            let files = e.target.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();

            // let vm = articleData;
            
            reader.onload = (e) => {
                articleData.image = file;
            };
            
            reader.readAsDataURL(file);
        },
        removeImage(e) {
            articleData.image ='';
        },
        addArticle(articleData)
        {
           
            if(!articleData.edit)
            {
                axios.post(`create-article`,articleData)
                .then(res => {
                        
                    if(res.data.hasError==1)
                    {
                        $.each(res.data.messages, function(k,v)
                        {
                            alert(v);
                        });
                    }
                    else{
                        alert('Article created');
                    } 
                        // this.fetchArticles();
                })
                .catch(err => console.log(err))
            }
            else{
                
                axios.put('update-article',articleData)
                .then(res=>{
                    if(res.data.hasError==1)
                    {
                        $.each(res.data.messages, function(k,v)
                        {
                            alert(v);
                        })
                    }
                    else{
                        alert('Article Updated');
                    }
                })
            }
            
        },
        getArticle(article)
        {
            console.log(article);
        }
    }
}
</script>