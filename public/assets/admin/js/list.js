let dataList = [];

function toCardList(x){

    let mode = x.mode;
    let url = x.url;
    let targetID = x.target;
    let namaList = x.nama;

    if(dataList[namaList]){
        fetchListToTarget(x);
    }else{
        loadDataFromService(x);
    }

}

function loadDataFromService(x) {
    
    let mode = x.mode;
    let url = x.url;
    let targetID = x.target;
    let namaList = x.nama;

    fetch(Baseurl + 'api/test/tugas', {
        method: 'GET',
        headers: HEADER
    }).then(response => response.json()).then(res => {
        dataList[namaList] = res.data;
        fetchListToTarget(x);
    }).catch(error => {
        console.log(error);
        return false;
    });
}

function fetchListToTarget(x) {
    let mode = x.mode;
    let url = x.url;
    let targetID = x.target;
    let namaList = x.nama;

    switch(mode){
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

function fetchListToTargetWithNumber(x) {
    let targetID = x.target;
    let namaList = x.nama;

    let showBox = el('#'+targetID);
    showBox.innerHTML = `
        <div class='p-20'><div class='loader'></div></div>
    `;
    
    let data = dataList[namaList];
    let konten = "";
    for(let i=0; i<data.length; i++){
        konten += `
            <li>
                <div class='info icon'>
                    <div class='number'>
                        <span>`+(Number(i)+1)+`</span>
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
    showBox.innerHTML = `
        <ul class='unset-cursor'>
            `+konten+`
        </ul>
    `;
}

function fetchListToTargetWithImage(x) {
    let targetID = x.target;
    let namaList = x.nama;

    let showBox = el('#'+targetID);
    showBox.innerHTML = `
        <div class='p-20'><div class='loader'></div></div>
    `;

    let data = dataList[namaList];
    let konten = "";
    for(let i=0; i<data.length; i++){
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
    showBox.innerHTML = `
        <ul class='unset-cursor'>
            `+konten+`
        </ul>
    `;
}