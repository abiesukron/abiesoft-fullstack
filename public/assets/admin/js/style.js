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
});