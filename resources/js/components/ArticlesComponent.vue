<template>
    <div>
        <h1>Articles</h1>
        
            <button class="btn btn-primary mb-2" @click="showform()">
                {{ !showForm ? 'Add Article' : 'Cancel'}}
            </button>
        
            <div v-if="showForm">
                <ArticleForm></ArticleForm>
            </div>
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

import ArticleForm from './helpers/ArticleForm';

export default{
    name: 'articles',

    components:{
        ArticleForm
    },
    props: {
        articles:{
            type:Array,
            required:true
        }
    },
    data(){
        return {
            article:{
                id:'',
                name:'',
                description:'',
                image:''
            },
            showForm:false,
            edit:false
        }
    },
    methods: {

        showform()
        {
            this.showForm = !this.showForm;
        },
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
        editArticle(article)
        {
            this.edit = true;
            this.article.id = article.id;
            this.article.name = article.name;
            this.article.description = article.description;
            this.article.image = article.image;
        }
    },

    mounted() {
        // console.log(this.articles);
    }
}

</script>
