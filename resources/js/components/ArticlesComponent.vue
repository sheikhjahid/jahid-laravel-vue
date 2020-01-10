<template>
    <div>
        <h1>Articles</h1>
        
        <div v-if="view">
            <button class="btn btn-primary mb-2" v-on:click="close">Close</button>
            <single-article :article="this.getData"></single-article>
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
                                <button class="btn btn-primary" v-on:click="viewArticle(article)">View</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

import SingleArticle from './helpers/SingleArticle';

export default{
    name: 'articles',
    components:{
        'single-article':SingleArticle
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
            view:false,
            getData:{}
        }
    },
    methods: {
        viewArticle(article)
        {
            this.view = true;
            this.getData = article;
        },
        close()
        {
            this.view = false;
        }
    },

    mounted() {
        console.log(this.articles);
    }
}

</script>
