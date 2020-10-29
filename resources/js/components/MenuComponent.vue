<template>
<div class="menu" id="menu">
    <div class="container">
        <div class="menu__nav">
            <li v-for="(item, idx) in menu" 
                :key="idx" 
                :class="{'active' : idx < 1}"
                 class="menu__item">
                <a  :href="item.url" class="menu__link">
                    {{ item.title }}
                </a>
            </li>
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
.menu__item{ 
    display: inline-block;
    position: relative;
    list-style-type: none;
}
</style>