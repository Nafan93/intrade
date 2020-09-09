<template>
    
        <yandex-map :coords="coords" style="width:100%; height:100%"  :zoom="18" @click="onClick">
            <ymap-marker
                :coords="coords"
                marker-id="123"
                hint-content="some hint"
            />
        </yandex-map>
    
</template>
<script>
import { yandexMap, ymapMarker } from "vue-yandex-maps";

export default {
    components: { yandexMap, ymapMarker },
    data: () => ({
        coords: [44.998783, 41.091637]
    }),
    methods: {
        onClick(e) {
            this.coords = e.get("coords");
        }
    }
};
</script>
