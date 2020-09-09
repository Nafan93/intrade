<template>
    <div>
       <div class="callback" v-on:click="isActive=!isActive">
           <a class="callback-btn">
               <span>?</span>
           </a>
            <div class="callback-nav" v-bind:class="{'callback-nav--active': isActive}">
               <a class="callback-nav__phone" v-on:click="isCallBackForm=!isCallBackForm"><i class="fa fa-phone" aria-hidden="true"></i></a>
               <a class="callback-nav__message" v-on:click="isChatForm=!isChatForm"><i class="fa fa-commenting-o" aria-hidden="true"></i></a>
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

        <div id="chatForm" class="chatForm" :class="{'chatForm-open': isChatForm}">
            
            <div class="chatForm-head">
                <div class="chatForm-head_operator">
                    <img src="" alt="" class="chatForm-head_operator__avatar">
                    <div class="chatForm-head_operator_info">
                        <span class="chatForm-head_operator_info__name">Артем</span>
                        <!-- /.operator__name -->
                        <span class="chatForm-head_operator_info__status">Online</span> 
                        <!-- /.operator__status -->
                    </div>
                </div>
                <!-- /.chatForm-head_operator -->
                <div class="chatForm-head_close" v-on:click="isChatForm=!isChatForm">
                    <span class="chatForm-head_close__line" ></span>
                    <span class="chatForm-head_close__line" ></span>
                </div>
                <!--/ .chatForm-head_close-->
            </div>
            <!-- /.chatForm-head -->
                
            <div class="chatForm-body">

                <div class="chatForm-history">
                    <div class="chatForm-history_message chatForm-history_message__operator">
                         <span class="chatForm-history_message__corner chatForm-history_message__operator-corner">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 13" width="8" height="13"><path opacity=".13" fill="#0000000" d="M1.533 3.568L8 12.193V1H2.812C1.042 1 .474 2.156 1.533 3.568z"></path><path fill="currentColor" d="M1.533 2.568L8 11.193V0H2.812C1.042 0 .474 1.156 1.533 2.568z"></path></svg>
                        </span>
                        <p>Hi! Are you have any questions?</p>
                    </div>
                    <!-- /.chatForm-history_message__operator -->

                    <div class="chatForm-history_message chatForm-history_message__customer">
                        <span class="chatForm-history_message__corner chatForm-history_message__customer-corner">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 13" width="8" height="13"><path opacity=".13" d="M5.188 1H0v11.193l6.467-8.625C7.526 2.156 6.958 1 5.188 1z"></path><path fill="currentColor" d="M5.188 0H0v11.193l6.467-8.625C7.526 1.156 6.958 0 5.188 0z"></path></svg>
                        </span>
                        <p>Good afternoon. I have some question</p>
                    </div>
                    <!-- /.chatForm-history_message__customer -->

                </div>
                <!-- /.chatForm-history -->

                <div class="chatForm-inputField uk-inline">
                    <a  type="submit" class="uk-form-icon uk-form-icon-flip" uk-icon="icon: play-circle"></a>
                    <input class="uk-input" placeholder="Type your message here"/>

                    <!-- /# -->
                </div>
                <!-- /.chatForm-entryField -->

            </div>
            <!-- /.chatForm-body -->
        </div>
        <!-- /.online-chatForm -->

    </div>
</template>

<script>
    export default {
        data() {
            return{
            isActive : false,
            isCallBackForm: false,
            isChatForm: false
            }
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