<template>
  <div>
    
    <div >
        <div class="contacts-feedback_form">
            
            <div v-if="success" class="uk-alert" uk-alert>
                <h2 class="uk-modal-title uk-alert-success uk-text-center">Заявка на обратный звонок принята</h2>
                <p class="uk-alert uk-text-center"> В ближайшее время мы с вами свяжемся </p>
            </div>    
            <div v-else> 
             <div class="contacts-feedback_form contacts__element">
                <legend class="uk-legend">Заказать обратный звонок</legend>
            </div>
            <!-- /.contacts-feedback_form__element -->
              <form @submit.prevent="submit">
                
                <div class="uk-text-center">
                    <div class="contacts-feedback_form contacts__element">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input class="uk-input uk-form-large" type="text" name="feedback_name" v-model="fields.feedback_name" placeholder="Ваше имя"/>
                            <div v-if="errors && errors.feedback_name" class="uk-text-danger">{{ errors.feedback_name[0] }}</div>
                        </div>
                    </div>
                    <div class="contacts-feedback_form contacts__element">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: phone"></span>
                            <masked-input class="uk-input uk-form-large" mask="\+\7 (111) 111-11-11"  type="phone" name="feedback_phone" v-model="fields.feedback_phone" placeholder="Номер телефона"/>
                            <div v-if="errors && errors.feedback_phone" class="uk-text-danger">{{ errors.feedback_phone[0] }}</div>
                        </div>
                    </div>
                    <div class="contacts-feedback_form contacts__element">
                        <input class="uk-checkbox" type="checkbox" name="feedback_agreement" id="feedback_agreement" v-model="fields.feedback_agreement"/>
                        <label for="feedback_agreement" class=" uk-text-small">Подтверждаю сагласие на обработку данных</label>
                        <div v-if="errors && errors.feedback_agreement" class="uk-text-danger">{{ errors.feedback_agreement[0] }}</div>
                    </div>
                </div>
                <div class="contacts-feedback_form__button  contacts__element">
                    <button class="uk-button uk-button-primary" type="submit">Запросить</button>
                </div>

            </form>
            </div>
        </div>
    </div>
    
  </div>
</template>

<script>
import MaskedInput from 'vue-masked-input'
export default {
  props: ['id'],
  data() {
    return {
      fields: {
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
        axios.post('/callback', this.fields).then(response => {
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
  components: {
    MaskedInput
  },

}
</script>