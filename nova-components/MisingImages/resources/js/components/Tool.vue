<template>
    <div>
        <heading class="mb-6">Mising Images</heading>

        <card class="bg-90 flex flex-col items-center justify-center" style="min-height: 300px">
                      
        </card>
        <b-alert show variant="primary">Primary Alert</b-alert>
    </div>
</template>

<script>
export default {
   
    data: function () {
        return {
            categories: [],
        }
    },
    methods: {
    },
    created: function () {
        Nova.request().get('/nova-vendor/mising-images/data').then(response => {
            this.categories = response.data
        })
    }
}
</script>

<style>
/* Scoped Styles */
</style>
