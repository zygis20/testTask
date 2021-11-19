<template>
    <div class="container bg-light">
        <h1>Top news</h1>
        <div class="flex row container">
            <div v-for="favoritesArticle in favoritesArticles" :key="favoritesArticles.source" class="col-md-4">
                    <div class="height: auto">
                        <img class="img-fluid img-thumbnail" v-bind:src="favoritesArticle.urlToImage"/>
                    </div>
                    <div class="h-50">
                        <h6>{{ favoritesArticle.title}}</h6>
                        <p>{{ favoritesArticle.description}}</p>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TopNews",
    data(){
        return{
            favoritesArticles:[]
        }
    },
    mounted() {
        fetch('http://thinkbigtask.test/api/topheadlines')
        .then(res => res.json())
        .then(data => this.favoritesArticles = data)
        .catch(err => console.log(err.message))
    }
}
</script>
