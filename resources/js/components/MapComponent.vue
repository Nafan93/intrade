<template>
    
        <yandex-map :coords="coords" style="width:100%; height:100%"  :zoom="17">
            <ymap-marker
                :coords="coords"
                marker-id="123"
                hint-content='ООО "Интрейд"'
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
    
};
</script>
