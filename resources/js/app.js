/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('our-progress', require('./components/OurProgress.vue').default);
Vue.component('menu-component', require('./components/MenuComponent.vue').default);
Vue.component('map-component', require('./components/MapComponent.vue').default);
Vue.component('modal-hero', require('./components/modals/ModalHero.vue').default);
Vue.component('modal-product', require('./components/modals/ModalProduct.vue').default);
Vue.component('modal-bepartner', require('./components/modals/ModalBeParter.vue').default);
Vue.component('modal-catalog-product', require('./components/modals/ModalCatalogProduct.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

//ждем загрузку
document.addEventListener('DOMContentLoaded', () => {

    //open menu
    const btnOpenMenu = document.querySelector('#btnOpenMenu');
    const menu = document.querySelector('#menu');
    btnOpenMenu.addEventListener('click', () => {

        switch (true) {
            case btnOpenMenu.classList.contains('menu-btn--active'):
                btnOpenMenu.classList.remove('menu-btn--active')
                menu.classList.remove('menu_active')
                console.log("active has removed");
                break;

            default:
                btnOpenMenu.classList.add('menu-btn--active')
                menu.classList.add('menu_active')
                console.log("active has added");
                break;
        }
    });
    //
    //Set header height
    let screen = document.body.clientHeight;
    console.log(screen, 'screen');
    document.querySelector(".header__wraper").style.height = screen + "px";

    window.addEventListener('resize', function() {

        let screen = document.documentElement.clientHeight;
        console.log(screen, 'screen resize');
        document.querySelector(".header__wraper").style.height = screen + "px";
    });
    //
    //sticky navbar
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('#navbar');
        const menuBtnLine = document.querySelectorAll('.menu-btn__line');

        let scrollDistance = window.scrollY;

        if (scrollDistance <= 40) {
            navbar.classList.remove('navbar__white');
            menu.style.cssText = "top: 80px"
        } else {
            navbar.classList.add('navbar__white');
            menu.style.cssText = "top: 40px"
        }

        menuBtnLine.forEach((el, i) => {
            if (scrollDistance <= 40) {
                el.classList.remove('menu-btn__line_white');
            } else {
                el.classList.add('menu-btn__line_white');
            }
        });
    });
    //
    //плавная прокрутка
    const makeMenuLinksSmooth = () => {
            const menuLinks = document.querySelectorAll('.menu__link');

            for (let n in menuLinks) {
                if (menuLinks.hasOwnProperty(n)) {
                    menuLinks[n].addEventListener('click', e => {
                        e.preventDefault();
                        document.querySelector(menuLinks[n].hash)
                            .scrollIntoView({
                                behavior: "smooth"
                            });
                    });
                }
            }
        }
        //
        //отслеживание скролла
    const spyScrolling = () => {
        const sections = document.querySelectorAll('.section');

        window.onscroll = () => {
            const scrollPos = document.documentElement.scrollTop + 200 || document.body.scrollTop;

            for (let s in sections)

                if (sections.hasOwnProperty(s) && sections[s].offsetTop <= scrollPos) {
                const id = sections[s].id;
                document.querySelector('.active').classList.remove('active');
                document.querySelector(`a[href*=${ id }]`).parentNode.classList.add('active');
            }
        }
    }

    makeMenuLinksSmooth();
    spyScrolling();


});