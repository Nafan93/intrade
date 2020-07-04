<template>
    <div>
       <div class="callback" v-on:click="isActive=!isActive">
           <a class="callback-btn">
               <span>?</span>
           </a>
            <div class="callback-nav" v-bind:class="{'callback-nav--active': isActive}">
               <a class="callback-nav__phone" v-on:click="isCallBackForm=!isCallBackForm"><i class="fa fa-phone" aria-hidden="true"></i></a>
               <a class="callback-nav__message"><i class="fa fa-commenting-o" aria-hidden="true"></i></a>
           </div>
        </div>
        <!--callback button-->
        
        <div id="modal-sections" uk-modal :class="{'uk-open':isCallBackForm, 'uk-modal':true}" :style="isCallBackForm ? 'display: block;':''">
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <h2 class="uk-modal-title uk-text-center">Закзать обратный звонок</h2>
                </div>
                <div class="uk-modal-body">
                   <form>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input class="uk-input" type="text" placeholder="Ваше имя">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: phone"></span>
                                <input class="uk-input" type="phone" placeholder="Ваш номер телефона">
                            </div>
                        </div> 
                    </form>
                 </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Закрыть</button>
                    <button class="uk-button uk-button-primary" type="button">Перезвоните мне!</button>
                </div>
            </div>
        </div>      

    </div>
</template>

<script>
    export default {
        data() {
            return{
            isActive : false,
            isCallBackForm: false}
        }
    }
</script>

<style lang='sass'>
.callback 
    position: fixed 
    bottom:40px 
    right:40px 
    display: flex
    justify-content: center
    align-items: center
    cursor: pointer
    &-btn
        display: block
        width: 50px
        height: 50px
        background: #0c30a5
        box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)
        border: 1px solid  rgba(#ffffff30, .3)
        border-radius: 50%
        position: relative
        z-index: 3
        & span 
            display: block
            position: absolute
            left: calc(42% )
            top: calc(32% )
            font-family: "Roboto Bold", sans-serif
            color: #fff
    &-nav a
        display: flex
        justify-content: center
        align-items: center
        background-color: #0A2C9A 
        color: #fff
        width: 30px
        height: 30px
        border: 1px solid  rgba(#ffffff, .3)
        border-radius: 50%
        transition: 0.4s
        position: absolute
        left: calc(50% - 15px)
        top: calc(50% - 15px)
        z-index: 0
        &:hover
            color: #fff
    & a:nth-child(1)
        transition-delay: 0.1s
    & a:nth-child(2)
        transition-delay: 0.2s
    &-nav--active a:nth-child(1)
        transform: translate(-120%, 30px)
    &-nav--active a:nth-child(2)
        transform: translate(-120%,-30px)      
    &__phone
        display: block
        & a:hover
            color: #fff
.uk-modal-dialog
   width: 470px
</style>