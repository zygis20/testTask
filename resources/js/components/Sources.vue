<template>
    <div class="container bg-light">
        <h1>Sources screen</h1>
        <div class="flex row container justify-content-center">
            <div v-for="topheadlinesSource in topheadlinesSources" :key="topheadlinesSources.source"
                 class="border col-md-3 m-2">
                <div>
                    <h3>{{ topheadlinesSource.id}}</h3>
                    <p>{{ topheadlinesSource.description}}</p>
                    <button class="btn-primary btn-sm" @click="goto">Go to oficial wesite</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Sources",
    data(){
        return{
            topheadlinesSources:[]
        }
    },
    mounted() {
        fetch('http://thinkbigtask.test/api/topheadlinesSource')
            .then(res => res.json())
            .then(data => this.topheadlinesSources = data)
            .catch(err => console.log(err.message))
    },
    methods:{
        goto(){
            let topheadlinesSources;
            window.open(topheadlinesSources.url, '_blank')
        }
    }
};
</script>
