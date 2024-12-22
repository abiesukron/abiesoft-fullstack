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
let Baseurl = getMeta("x-Baseurl");
let Prefix = getMeta("x-Prefix");

let popup = [];

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
    let pesan = el('#pesan');

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
                pesan.classList.remove('show');
            }
        }

        // Notifikasi Toggle
        if(e.target.dataset.toggle == "notifikasi"){
            if(notifikasi.classList.contains('show')){
                notifikasi.classList.remove('show');
            }else{
                notifikasi.classList.add('show');
                profile.classList.remove('show');
                pesan.classList.remove('show');
            }
        }

        // Pesan Toggle
        if(e.target.dataset.toggle == "pesan"){
            if(pesan.classList.contains('show')){
                pesan.classList.remove('show');
            }else{
                pesan.classList.add('show');
                profile.classList.remove('show');
                notifikasi.classList.remove('show');
            }
        }
        
    }else{

        let bodyWidth = document.body.clientWidth;
        if(bodyWidth < 768){
            sidebar.classList.remove('show');
            topbar.classList.remove('show');
            page.classList.remove('show');
        }

        profile.classList.remove('show');
        notifikasi.classList.remove('show');
        pesan.classList.remove('show');

    }
});





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
                console.log(keycode);
                inputKeyboard[i].focus();
            }
        }
    }
});