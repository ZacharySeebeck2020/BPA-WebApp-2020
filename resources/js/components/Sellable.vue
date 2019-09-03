<template>
    <div class="card" style="width: 18rem;">
        <img :src="img_url" class="card-img-top" alt="...">
        <div class="card-body justify-content-center">
            <h5 class="card-title text-center">{{ title }}</h5>
            <p class="card-text">{{ price }}</p>
            <a href="#" class="btn btn-primary">View Product</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'img_url',
            'title',
            'price'
        ],

        mounted() {
        }
    }
</script>
