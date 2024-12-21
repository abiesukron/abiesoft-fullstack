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
        
    }else{

        let bodyWidth = document.body.clientWidth;
        if(bodyWidth < 768){
            sidebar.classList.remove('show');
            topbar.classList.remove('show');
            page.classList.remove('show');
        }

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