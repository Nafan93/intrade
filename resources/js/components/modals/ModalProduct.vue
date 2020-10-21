<template>
  <div>
    
    <div id="modal-product" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
            <button class="uk-modal-close-outside" type="button" uk-close></button>
            <div v-if="success" class="uk-alert-success" uk-alert>
                <h2 class="uk-modal-title uk-alert-success uk-text-center">Заявка успешно оформлена</h2>
                <p class="uk-alert-success uk-text-center"> Спасибо! </p>
            </div>    
            <div v-else> 
              <h2 class="uk-modal-title">Заказать предложение</h2>
              <form @submit.prevent="submit">
                
                <div class="uk-text-center">
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input class="uk-input uk-form-large" type="text" name="name" v-model="fields.name" placeholder="Ваше имя"/>
                            <div v-if="errors && errors.name" class="uk-text-danger">{{ errors.name[0] }}</div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: mail"></span>
                            <input class="uk-input uk-form-large" type="text" name="email" v-model="fields.email" placeholder="Ваш e-mail"/>
                            <div v-if="errors && errors.email" class="uk-text-danger">{{ errors.email[0] }}</div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline">                              
                            <input class="uk-checkbox" type="checkbox" name="agreement" v-model="fields.agreement" placeholder="Ваш e-mail"/>
                            <label for="agreement" class=" uk-text-small">Подтверждаю сагласие на обработку данных</label>
                            <div v-if="errors && errors.agreement" class="uk-text-danger">{{ errors.agreement[0] }}</div>
                        </div>
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-center">
                    <button class="uk-button uk-button-primary" type="submit">Заказать!</button>
                </div>

            </form>
            </div>
        </div>
    </div>
    
  </div>
</template>

<script>
export default {
  props: ['id'],
  data() {
    return {
      fields: {
        product_id: this.id,
        status: 'new'
      },
      errors: {},
      success: false,
      loaded: true,
    }
  },
  methods: {
    submit() {
      if (this.loaded) {
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios.post('/send', this.fields).then(response => {
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
  },

}
</script>