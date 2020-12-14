<template>
    <div>
        <div
            class="ourProgress"
            uk-scrollspy="cls: uk-animation-scale-up; repeat: false"
        >
            <div class="ourProgress-title"><span>Мы в цифрах</span></div>
            <ul class="ourProgress-list counters" id="counters">
                <counters-block
                    v-for="item in counters"
                    :key="item.id"
                    v-bind:counter="item"
                >
                </counters-block>
            </ul>
         </div>
    </div>
</template>

<script>
Vue.component("counters-block", {
    props: ["counter"],
    template: `<li class="ourProgress-list_item">
                  <span class="ourProgress-list_item__count">
                      {{ val }}{{  counter.plus }}
                    </span>
                    <p class="ourProgress-list_item__description">
                      {{ counter.description }}
                    </p>
                </li>`,
    data: () => ({
      val: 0,
    }),
    
    methods: {
      onScroll() {
        if (this.$el.offsetTop + this.$el.offsetHeight < window.scrollY + window.innerHeight) {
          this.removeScrollHandler();
          const interval = setInterval(() => {
            if (++this.val === this.counter.max) {
              clearInterval(interval);
            }
          }, 6000 / this.counter.max);
        }
        
    },
      removeScrollHandler() {
        window.removeEventListener('scroll', this.onScroll);
    },
    },
    mounted() {
      window.addEventListener('scroll', this.onScroll);
      this.$on('hook:beforeDestroy', this.removeScrollHandler);
      this.onScroll();
    },
});
var date = new Date().getFullYear() - 2
export default {
    data() {
        return {
            counters: [
                {   
                    id: 1, 
                    max: 20, 
                    plus: "+", 
                    description: "лет на рынке" 
                },
                {
                    id: 2,
                    max: 198,
                    description: "лет, суммарный опыт работы наших специалистов"
                },
                {
                    id: 3,
                    max: 90,
                    plus: "+",
                    description: "постоянных клиентов"
                },
                {
                    id: 4,
                    max: 560,
                    description: "тысяч тонн нефтепродуктов отгружено в 2019 году"
                }
            ]
        };
    }
};
</script>

<style></style>
