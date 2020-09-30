<template>
<div class="menu" id="menu">
    <div class="uk-container">
        <div class="menu__nav">
            <a  v-for="(item, idx) in menu" 
                :key="idx" :href="item.url" 
                :class="{'active' : idx < 1}" 
                class="menu__link">
                {{ item.title }}
            </a>
        </div>
        <!-- /.menu__nav -->
    </div>
    <!-- /.container -->
</div>
<!-- /.menu -->  
</template>

<script>
export default {
    name:"Menu",
    // Входной параметр, через который компонент принимает данные в JSON представление.
    props: ['menu'],
    
    mounted() {
        this.update();
    },
    methods: {
        update: function() {
            console.log(this.update);
            
        }
    }

}
</script>

<style>

</style>