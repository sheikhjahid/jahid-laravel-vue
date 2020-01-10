<template>
       <div class="container">
       

        
        <div class="card mb-2">
            <div class="card-header">Profile Details</div>
            <div class="card-body ml-2">{{user.name }}</div>
            <div class="card-body ml-2">{{user.email }}</div>
        </div>
        
        <button class="btn btn-primary mb-2" v-on:click="showform">
            {{ !showForm ? 'Article Form' : 'Cancel'}}
        </button>
        
        <div v-if="showForm">
             <article-form :articleData="this.getData"></article-form>
        </div>
        
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
                            v-for="(article, index) in user.articles"
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
        <pre>{{ selected }}</pre>
        <select v-model="selected" class="form-control">
                        <option disabled>Select Product...</option>
                        <option v-for="article in user.articles" :key="article.id" :value="article.id">{{ article.name }}</option>
                    </select>

   </div>
</template>

<script>
import ArticleForm from './helpers/ArticleForm';

export default{
    name:'profile',
    components:{
       'article-form':ArticleForm
    },
    props:{
        user:{
            type:Object,
            required:true
        }
    },
    data(){
        return {
            showForm:false,
            getData:{},
            edit:false,
            selected:{}
        }
    },
    methods:{
        showform(){
            this.showForm = !this.showForm;
        },
        editArticle(article)
        {
            this.getData = {
                id:article.id,
                name:article.name,
                description:article.description,
                image:article.image,
                edit:true
            };
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
                        
                    }
                    else{
                        alert("Unable to delete article");
                    }
                })
                .catch(err => console.log(err));
            }
        },
    },
    mounted(){
        console.log(this.user)
    }
}
</script>
