<template>
    <form enctype="multipart/form-data" @submit.prevent="addArticle()"  class="mb-2">
            <div class="form-group">
                <input class="form-control" placeholder="Name.." type="text" v-model="article.name">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Description.." v-model="article.description"></textarea>
            </div>
            <div v-if="!article.image" class="form-group">
                <input type="file" v-on:change="onImageChange">
            </div>
             <div v-else class="form-group">
                <img :src="'storage/'+article.image" />
                <button @click="removeImage">Remove image</button>
            </div>    
        <button type="submit" class="btn btn-light btn-block">Submit</button>
    </form>
</template>

<script>

export default{
    name: 'ArticleForm',
    
    data(){
       return  {
            article:{
                id:'',
                name:'',
                description:'',
                image:'',
            }
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

            let vm = this.article;
            
            reader.onload = (e) => {
                vm.image = file;
            };
            
            reader.readAsDataURL(file);
        },
        removeImage(e) {
            this.article.image ='';
        },
        addArticle()
        {
            axios.post(`create-article`,this.article)
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
        },
        getArticle(article)
        {
            console.log(article);
        }
    }
}
</script>