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
                            v-for="(article, index) in articles.data"
                            :key="article.id" scope="row">
                            <td>{{ index + 1 }}</td>
                            <td>{{ article.name }}</td>
                            <td>{{ article.description }}</td>
                            <td>
                                <button class="btn btn-primary" v-on:click="viewArticle(article)">View</button>
                                <social-sharing :url="'https://'+article.name+'/'" inline-template>
                                    <div>
                                        <network network="facebook">
                                        <i class="fa fa-facebook"></i> Facebook
                                        </network>
                                        <network network="linkedin">
                                        <i class="fa fa-linkedin"></i> LinkedIn
                                        </network>
                                        <network network="pinterest">
                                        <i class="fa fa-pinterest"></i> Pinterest
                                        </network>
                                        <network network="reddit">
                                        <i class="fa fa-reddit"></i> Reddit
                                        </network>
                                        
                                    </div>
                                </social-sharing>
                            </td>
                           
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <pagination :data="articles" @pagination-change-page="getResults"></pagination>
    </div>
</template>

<script src="/vue-social-sharing.min.js"></script>
<script>

import SingleArticle from './helpers/SingleArticle';

export default{
    name: 'articles',
    components:{
        'single-article':SingleArticle
    },
     mounted() {
        axios.get(`get-articles`)
            .then(res => {
                this.articles = res.data;
            });
       
    },
    data(){
        return {
            articles:{},
            view:false,
            getData:{}
        }
    },
    created()
    {
        this.getResults();
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
        },
        getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
      
                this.$http.get(`get-articles?page=` + page)
                    .then(res => {
                        this.articles = res.data;
                    });
            }
    }
   
}

</script>
