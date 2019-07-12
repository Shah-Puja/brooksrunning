<template>
    <div>
        <heading class="mb-6">Category Sort</heading>

        <card class="flex flex-col items-center justify-center">
            <select class="w-1/2 h-8 text-xl no-appearance bg-40 my-4" @change="getProducts">
                <option value="">Choose Category</option>
                <option v-for="category in categories" :value="category.id+'_'+category.slug">{{ category.slug }}</option>
            </select>
            <draggable 
                class="w-1/2"
                v-if="showList"
                v-model="products"
                group="products"
                @start="drag=true"
                @end="drag=false"
            >
               <div class="flex justify-between items-center p-2 my-2 bg-40 cursor-move" v-for="product in products" :key="product.id">
                    <img :src="product.image">
                    <p>{{ product.name }}</p>
                    <p v-html="product.price"></p>
               </div>
            </draggable>
            <card v-if="rankingSaved" class="w-1/3 p-4 my-2 mx-auto text-center bg-success text-white">Product ranking has been saved!</card>
            <img src='/images/loader.gif' v-if="showLoader" >
            <button v-if="showList" type="button" class="btn btn-default btn-primary my-4" @click="saveRanking">Save Sort Order</button>
        </card>
    </div>
</template>

<script>
import draggable from 'vuedraggable';
export default {
    components: {
        draggable,
    },
    data: function () {
        return {
            categories: [],
            products: [],
            showList: false,
            rankingSaved: false,
            showLoader: false
        }
    },
    methods: {
        getProducts: function (e) {
            this.showLoader = true
            this.rankingSaved = false
            this.showList = false
            Nova.request().get('/nova-vendor/category-sort/products/'+e.target.value).then(response => {
                this.products = response.data
                this.showList = true
                this.showLoader = false
            })
            
        },
        saveRanking: function (e) {
            Nova.request().post('/nova-vendor/category-sort/products', {ranking: this.products})
            this.rankingSaved = true
            this.showLoader = false
        }
    },
    created: function () {
        Nova.request().get('/nova-vendor/category-sort/categories').then(response => {
            this.categories = response.data
        })
        this.showLoader = false
    }
}
</script>

<style>
/* Scoped Styles */
</style>
