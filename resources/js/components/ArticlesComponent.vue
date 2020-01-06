<template>
    <div>

        <h1>Articles</h1>

        <form @submit.prevent="addArticle()"  class="mb-2">
            <div class="form-group">
                <input class="form-control" name="name" placeholder="Name.." type="text" v-model="article.name">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" placeholder="Description.." v-model="article.description"></textarea>
            </div>
            <button type="submit" class="btn btn-light btn-block">Submit</button>
        </form>

        <hr>
        
        <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id">
            <h3>{{ article.name }}</h3>
            <p>{{ article.description }}</p>
            <hr>
            <button class="btn btn-warning mb-2" @click="editArticle(article)">Edit</button>
            <button class="btn btn-danger" @click="deleteArticle(article.id)">Delete</button>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item">
                    <a class="page-link" href="#" @click="fetchArticles(pagination.prev_page_url)">Previous</a>
                </li>
                
                <li class="page-item disabled"><a class="page-link text-dark" href="#">
                    Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                </li>

                <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item">
                    <a class="page-link" href="#" @click="fetchArticles(pagination.next_page_url)">Next</a>
                </li>
            </ul>
        </nav>

    </div>
</template>

<script>

export default{
    data(){
       return {
           articles: [],
           article:{
               id:'',
               name:'',
               description:'',
               image:''
           },
           article_id:'',
           pagination:{},
           edit:false
       }
    },
    created(){
        this.fetchArticles();
    },
    methods: {
        fetchArticles(page_url){
            let vm = this;
            page_url = page_url || 'articles';
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.articles = res.data;
                vm.makePagination(res);
            })
            .catch(err => console.log(err))
        },
        makePagination(meta)
        {
            let pagination = {
                current_page : meta.current_page,
                last_page : meta.last_page,
                next_page_url :meta.next_page_url,
                previous_page_url : meta.prev_page_url
            }
            this.pagination = pagination;
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
                        this.fetchArticles();
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
                    this.fetchArticles();
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
                    this.fetchArticles();
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
    }
}

</script>
