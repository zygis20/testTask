<template>
    <div class="container bg-light">
        <h1>Articles screen</h1>
        <div class="flex row container" >
            <div v-for="article in articles" :key="articles.source" class="col-md-4" >
                <div class="height: auto">
                    <img class="img-fluid img-thumbnail" v-bind:src="article.urlToImage"/>
                </div>
               <div class="h-50">
                   <h6>{{ article.title}}</h6>
                   <p>{{ article.description}}</p>
                   <p>{{ article.publishedAt}}</p>
               </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Articles",
    data(){
        return{
            articles:[]
        }
    },
    mounted() {
        fetch('http://thinkbigtask.test/api/articles')
            .then(res => res.json())
            .then(data => this.articles = data)
            .catch(err => console.log(err.message))
    }

}
</script>
