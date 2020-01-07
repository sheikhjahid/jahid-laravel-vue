<template>
    <div>
        <h1>Articles</h1>

        <form enctype="multipart/form-data" @submit.prevent="addArticle()"  class="mb-2">
            <div class="form-group">
                <input class="form-control" placeholder="Name.." type="text" v-model="article.name">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Description.." v-model="article.description"></textarea>
            </div>
            <div class="form-group">
                <img src="'storage/'+article.image" width="200" height="200">
                <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-light btn-block">Submit</button>
        </form>

        <hr>

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions #</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(article, index) in articles"
                            :key="article.id" scope="row">
                            <td>{{ index + 1 }}</td>
                            <td>{{ article.name }}</td>
                            <td>{{ article.description }}</td>
                            <td>
                                <button class="btn btn-warning" @click="editArticle(article)">Edit</button>
                                <button class="btn btn-danger" @click="deleteArticle(article.id)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

export default{
    name: 'articles',
    props: {
        articles:{
            type:Array,
            required:true
        }
    },
    data(){
       return {
        //    articles:[],
           article:{
                id:'',
                name:'',
                description:'',
                image:''
            },
            edit:false
       }
    },
    // created(){
    //     this.fetchArticles();
    // },
    methods: {
        // fetchArticles()
        // {
        //     axios.get('articles');
        // },
        deleteArticle(id)
        {
            if(confirm('Are you sure you want to delete?'))
            {
                fetch(`delete-article/${id}`)
                .then(res => res.json())
                .then(data => {
                    if(data==1)
                    {
                        alert('Article removed');
                        // this.fetchArticles();
                    }
                    else{
                        alert("Unable to delete article");
                    }
                })
                .catch(err => console.log(err));
            }
        },
        addArticle()
        {
            if(this.edit===false)
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
            }
            else{
                axios.put(`update-article`,this.article)
                .then(res => {
                    if(res.data.hasError==1)
                    {
                        $.each(res.data.messages, function(k,v)
                        {
                            alert(v);
                        });
                    }
                    else
                    {
                        alert('Article updated');
                    }
                    // this.fetchArticles();
                })
                .catch(err => console.log(err))
            }
        },
        editArticle(article)
        {
            this.edit = true;
            this.article.id = article.id;
            this.article.name = article.name;
            this.article.description = article.description;

        }
    },

    mounted() {
        
    }
}

</script>
