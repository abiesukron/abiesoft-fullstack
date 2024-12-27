function el(x) {
    let result = document.querySelector(x);
    return result;
}


function getMeta(metaName) {
    const metas = document.getElementsByTagName('meta');
    for (let i = 0; i < metas.length; i++) {
        if (metas[i].getAttribute('name') === metaName) {
            return metas[i].getAttribute('content');
        }
    }
    return '';
}

const apikey = getMeta("x-Apikey");
const Baseurl = getMeta("x-Baseurl");
const Prefix = getMeta("x-Prefix");
const body = el('body');
const iconmode = el('#iconmode');

let popup = [];

const currentTheme = getCookie('_AT') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark-mode' : 'light-mode');
body.classList.add(currentTheme);

if(currentTheme == 'dark-mode'){
    iconmode.innerHTML = `<svg data-toggle='mode' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path data-toggle='mode' d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18.894 6.166a.75.75 0 0 0-1.06-1.06l-1.591 1.59a.75.75 0 1 0 1.06 1.061l1.591-1.59ZM21.75 12a.75.75 0 0 1-.75.75h-2.25a.75.75 0 0 1 0-1.5H21a.75.75 0 0 1 .75.75ZM17.834 18.894a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 1 0-1.061 1.06l1.59 1.591ZM12 18a.75.75 0 0 1 .75.75V21a.75.75 0 0 1-1.5 0v-2.25A.75.75 0 0 1 12 18ZM7.758 17.303a.75.75 0 0 0-1.061-1.06l-1.591 1.59a.75.75 0 0 0 1.06 1.061l1.591-1.59ZM6 12a.75.75 0 0 1-.75.75H3a.75.75 0 0 1 0-1.5h2.25A.75.75 0 0 1 6 12ZM6.697 7.757a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 0 0-1.061 1.06l1.59 1.591Z" /></svg>`;
}else{
    iconmode.innerHTML = `<svg data-toggle='mode' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path data-toggle='mode'fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" /></svg>`;
}

window.addEventListener("click", (e)=>{
    Object.entries(popup).forEach(([key, value]) => {
        if(e.target.dataset.klik != key){
            value.innerHTML = "";   
        }
    });


    let sidebar = el('.sidebar');
    let topbar = el('.topbar');
    let page = el('.page');
    let profile = el('#profile');
    let notifikasi = el('#notifikasi');

    if(e.target.dataset.toggle){

        // Sidebar Toggle
        if(e.target.dataset.toggle == "sidebar"){
            if(sidebar.classList.contains('show')){
                if(e.target.dataset.toggle != "submenu"){
                    sidebar.classList.remove('show');
                    topbar.classList.remove('show');
                    page.classList.remove('show');
                }
            }else{
                sidebar.classList.add('show');
                topbar.classList.add('show');
                page.classList.add('show');
            }
        }

        // Profile Toggle
        if(e.target.dataset.toggle == "profile"){
            if(profile.classList.contains('show')){
                profile.classList.remove('show');
            }else{
                profile.classList.add('show');
                notifikasi.classList.remove('show');
            }
        }

        // Notifikasi Toggle
        if(e.target.dataset.toggle == "notifikasi"){
            if(notifikasi.classList.contains('show')){
                notifikasi.classList.remove('show');
            }else{
                notifikasi.classList.add('show');
                profile.classList.remove('show');
            }
        }

        // Mode dark light Toggle
        if(e.target.dataset.toggle == "mode"){
            const newTheme = document.body.classList.contains('dark-mode') ? 'light-mode' : 'dark-mode';
            body.classList.remove('dark-mode', 'light-mode');
            body.classList.add(newTheme);
            setCookie('_AT', newTheme, 7); 
            if(iconmode.innerHTML.split("").length == 424){
                iconmode.innerHTML = `<svg data-toggle='mode' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path data-toggle='mode' d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18.894 6.166a.75.75 0 0 0-1.06-1.06l-1.591 1.59a.75.75 0 1 0 1.06 1.061l1.591-1.59ZM21.75 12a.75.75 0 0 1-.75.75h-2.25a.75.75 0 0 1 0-1.5H21a.75.75 0 0 1 .75.75ZM17.834 18.894a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 1 0-1.061 1.06l1.59 1.591ZM12 18a.75.75 0 0 1 .75.75V21a.75.75 0 0 1-1.5 0v-2.25A.75.75 0 0 1 12 18ZM7.758 17.303a.75.75 0 0 0-1.061-1.06l-1.591 1.59a.75.75 0 0 0 1.06 1.061l1.591-1.59ZM6 12a.75.75 0 0 1-.75.75H3a.75.75 0 0 1 0-1.5h2.25A.75.75 0 0 1 6 12ZM6.697 7.757a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 0 0-1.061 1.06l1.59 1.591Z" /></svg>`;
            }else{
                iconmode.innerHTML = `<svg data-toggle='mode' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path data-toggle='mode'fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" /></svg>`;
            }

        }
        
    }else{

        if(body.clientWidth < 768){
            sidebar.classList.remove('show');
            topbar.classList.remove('show');
            page.classList.remove('show');
        }

        profile.classList.remove('show');
        notifikasi.classList.remove('show');

    }
});


function setCookie(name, value, days) {
    const d = new Date();
    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) === 0) {
            return c.substring(nameEQ.length, c.length);
        }
    }
    return null;
}





/*
    Sidebar
*/

let menu = document.querySelectorAll('li[data-menu]');
if(menu){
    for(let i=0; i<menu.length; i++){
        if(menu[i].dataset.menu == 'submenu') {
            menu[i].addEventListener('click', ()=>{
                if(menu[i].children[1].classList.contains('show')){
                    menu[i].children[1].classList.remove('show');
                    menu[i].children[0].children[1].setAttribute('style','transform: rotate(0deg)');
                }else{
                    menu[i].children[1].classList.add('show');
                    menu[i].children[0].children[1].setAttribute('style','transform: rotate(90deg)');
                }
            });
        }
    }
}


document.addEventListener('keydown', function(event) {
    const keycode = event.keyCode || event.which;
    let inputKeyboard = document.querySelectorAll('input[data-keyboard]');
    if(inputKeyboard){
        for(let i=0; i<inputKeyboard.length; i++){
            if(inputKeyboard[i].dataset.keyboard == keycode) {
                inputKeyboard[i].focus();
            }
        }
    }
});


let currentPage = document.querySelectorAll('li[data-current]');
if(currentPage){
    let current = window.location.pathname.split('/')[3];
    if(!current){
        current = '/';
    }
    for(let i=0; i<currentPage.length; i++){
        if(currentPage[i].dataset.current == current){
            currentPage[i].setAttribute('class','active');
        }else{
            currentPage[i].removeAttribute('class');
        }
    }
}