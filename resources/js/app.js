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

    //
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
    let screen = document.documentElement.clientHeight;
    console.log(screen, 'screen');
    document.querySelector(".header__wraper").style.height = screen + "px";

    window.addEventListener('resize', function() {

        let screen = document.documentElement.clientHeight;
        console.log(screen, 'screen resize');
        document.querySelector(".header__wraper").style.height = screen + "px";
    });



    //
    // active class of menu items onscroll
    window.addEventListener('scroll', () => {
        let scrollDistance = window.scrollY;



        document.querySelectorAll('.section').forEach((el, i) => {
            if (el.offsetTop - document.querySelector('.navbar').clientHeight <= scrollDistance) {
                document.querySelectorAll('.menu__link').forEach((el) => {
                    if (el.classList.contains('active')) {
                        el.classList.remove('active');
                    }
                });
            }
        });
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
        console.log(menuBtnLine.length + 'elements');

        menuBtnLine.forEach((el, i) => {
            if (scrollDistance <= 40) {
                el.classList.remove('menu-btn__line_white');
            } else {
                el.classList.add('menu-btn__line_white');
            }
        });
    });

    //плавная прокрутка
    // собираем все якоря; устанавливаем время анимации и количество кадров
    const anchors = [].slice.call(document.querySelectorAll('a[href*="#"]')),
        animationTime = 300,
        framesCount = 100;

    anchors.forEach(function(item) {
        // каждому якорю присваиваем обработчик события
        item.addEventListener('click', function(e) {
            // убираем стандартное поведение
            e.preventDefault();

            // для каждого якоря берем соответствующий ему элемент и определяем его координату Y
            let coordY = document.querySelector(item.getAttribute('href')).getBoundingClientRect().top + window.pageYOffset;

            // запускаем интервал, в котором
            let scroller = setInterval(function() {
                // считаем на сколько скроллить за 1 такт
                let scrollBy = coordY / framesCount;

                // если к-во пикселей для скролла за 1 такт больше расстояния до элемента
                // и дно страницы не достигнуто
                if (scrollBy > window.pageYOffset - coordY && window.innerHeight + window.pageYOffset < document.body.offsetHeight) {
                    // то скроллим на к-во пикселей, которое соответствует одному такту
                    window.scrollBy(0, scrollBy);
                } else {
                    // иначе добираемся до элемента и выходим из интервала
                    window.scrollTo(0, coordY);
                    clearInterval(scroller);
                }
                // время интервала равняется частному от времени анимации и к-ва кадров
            }, animationTime / framesCount);
        });
    });


    //
});