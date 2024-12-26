let dataList = [];
let defaultTampilkan = [];
let jumlahData = [];
let keywordSearch = [];
let tampilkan = 6;
let loadmore = el('#loadmoreshow');
let search = el('#searchshow');
if(loadmore){
    loadmore.innerHTML = ``;
    search.innerHTML = ``;
}

function toCardList(x){
    
    let namaList = x.nama;
    let url = x.url;
    if(x.tampilkan){
        tampilkan = x.tampilkan;
    }
    defaultTampilkan[namaList] = tampilkan;
    keywordSearch[namaList] = "";
    fetch(Baseurl + url, {
        method: 'GET',
        headers: HEADER
    }).then(response => response.json()).then(res => {
        jumlahData[namaList] = res.data.length;
        if(dataList[namaList] != res.data){
            dataList[namaList] = res.data;
            fetchListToTarget(x);
        }else{
            fetchListToTarget(x);
        }

    }).catch(error => {
        console.log(error);
        return false;
    });

}

function fetchListToTarget(x) {
    let mode = x.mode;

    if(loadmore){
        loadmore.innerHTML = ``;
        search.innerHTML = ``;
    }

    switch(mode){
        case 'surat':
            fetchListToTargetWithSurat(x);
        break;
        case 'number':
            fetchListToTargetWithNumber(x);
        break;
        case 'image':
            fetchListToTargetWithImage(x);
        break;
        default:
            fetchListToTargetWithEmpty(x);
        break;
    }
}

function fetchListToTargetWithEmpty(x) {
    let targetID = x.target;

    let showBox = el('#'+targetID);
    showBox.innerHTML = `
        <div class='p-20'><div class='loader'></div></div>
    `;

    showBox.innerHTML = `
        <div class='empty card-list'>
            <div class='center'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M2.25 6a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V6Zm18 3H3.75v9a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V9Zm-15-3.75A.75.75 0 0 0 4.5 6v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V6a.75.75 0 0 0-.75-.75H5.25Zm1.5.75a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H7.5a.75.75 0 0 1-.75-.75V6Zm3-.75A.75.75 0 0 0 9 6v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V6a.75.75 0 0 0-.75-.75H9.75Z" clip-rule="evenodd" />
                </svg>
                <div class='title'>Belum Ada Data</div>
                <div class='des'>
                    <p>Untuk sementara belum ada data di halaman ini.</p>
                    <p>Silahkan klik tambah data untuk membuat data pertama</p>
                </div>
                <div class='area-button'>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                        </svg>
                        <span>Tambah Data</span>
                    </button>
                </div>
            <div>
        </div>
    `;
}

function fetchListToTargetWithSurat(x) {
    

}

function fetchListToTargetWithNumber(x) {
    
}

function fetchListToTargetWithImage(x) {
    let targetID = x.target;
    let namaList = x.nama;

    let showBox = el('#'+targetID);

    showBox.innerHTML = `
        <div class='p-20'><div class='loader'></div></div>
    `;
    
    let jumlah = jumlahData[namaList];
    let konten = "";
    let tampilkanmulaidari = 0;

    function loadKonten(){

        if(keywordSearch[namaList].split("").length == 0){
            if(tampilkanmulaidari > 0){
                loadmore.innerHTML = `<div class='center p-20'><div class='loader'></div></div>`;
            }else{
                loadmore.innerHTML = ``;
            }
        }else{
            konten = "";
            loadmore.innerHTML = ``;
        }

        setTimeout(()=>{
            let data = dataList[namaList];        
            let jumlahpertampilan = defaultTampilkan[namaList];
            let batastampil = 0;

            if(keywordSearch[namaList].split("").length == 0){
                batastampil = tampilkanmulaidari + jumlahpertampilan;
            }else{
                batastampil = jumlah;
                tampilkanmulaidari = 0;
            }
    
            for(let i=tampilkanmulaidari; i< batastampil; i++){
    
                if(i < jumlah){
    
                    let photo = Baseurl + "assets/admin/images/default.png";
                    if(data[i].photo != ''){
                        photo = data[i].photo;
                    }
                    konten += `
                        <li>
                            <div class='info icon'>
                                <div class='cover'>
                                    <img src='`+photo+`'>
                                </div>
                                <div>
                                    <span>`+data[i].nama+`</span>
                                    <small>`+data[i].email+`</small>
                                </div>
                            </div>
                            <div class='opsi'>
                                <button>
                                    <span>Lihat</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06l2.47-2.47H3a.75.75 0 0 1 0-1.5h16.19l-2.47-2.47a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </li>
                    `; 
    
                } 
    
            }
    
            tampilkanmulaidari += jumlahpertampilan;
    
            if(tampilkanmulaidari < jumlah){
                if(loadmore){
                    loadmore.innerHTML = `
                        <div class='card-footer'>
                            <div class='center'>
                                <button id='loadMore`+namaList+`'>Tampilkan lainnya</button>
                            </div>
                        </div>
                    `;

                    search.innerHTML = `
                        <div class='card-header-search'>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                            </svg>
                            <input id='searchinput`+namaList+`' type='text' placeholder='Ketik sesuatu untuk mencari (tekan ctrl + /)' data-keyboard='191'>
                        </div>
                    `;

                    el('#searchinput'+namaList).addEventListener('keyup', (e)=>{
                        let to = "";
                        if(to){
                            clearTimeout(to);
                        }
                        keywordSearch[namaList] = e.target.value;
                        to = setTimeout(()=>{
                            loadKonten();
                        },2000);
                    });
        
                    el('#loadMore'+namaList).addEventListener('click', ()=>{
                        loadKonten();
                    });
                }
            }else{
                if(loadmore){
                    loadmore.innerHTML = ``;
                }
            }
    
            showBox.innerHTML = `
            <ul class='unset-cursor'>
                `+konten+`
            </ul>`;
        },1000);

    }

    loadKonten();

}