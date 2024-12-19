/*
    Select Input
*/
const tipeelement = document.querySelectorAll('[data-tipe]');

if(tipeelement){
    for(let i=0; i<tipeelement.length; i++){
        // console.log(tipeelement[i].tagName);
        let parentelement = tipeelement[i].parentElement;
        let div = document.createElement('div');
        div.setAttribute('id','opsi'+tipeelement[i].id);
        parentelement.appendChild(div);

        let elementopsi = el("#opsi"+tipeelement[i].id);

        if(tipeelement[i].tagName == 'INPUT'){
            

            /*
                Jikda data-tipe='password'
            */
            if(tipeelement[i].dataset.tipe == 'password'){

                tipeelement[i].setAttribute('type','hidden');
                elementopsi.innerHTML = `
                    <div>
                        <div id='eye-`+tipeelement[i].id+`'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 action">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <input type='password' data-padding='right-icon' class='form-control' id='virtual-`+tipeelement[i].id+`' placeholder='`+tipeelement[i].placeholder+`' value='`+tipeelement[i].value+`'>
                    </div>
                `;

                let eye = el('#eye-'+tipeelement[i].id);
                let virtual = el('#virtual-'+tipeelement[i].id);
                virtual.addEventListener('keyup', ()=>{
                    tipeelement[i].value = virtual.value;
                });

                eye.addEventListener('click',()=>{
                    if(virtual.type == 'password'){
                        virtual.setAttribute('type','text');
                        eye.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 action">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        `;
                    }else{
                        virtual.setAttribute('type','password');
                        eye.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 action">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        `;
                    }
                });

            }


            /*
                Jikda data-tipe='email'
            */
            if(tipeelement[i].dataset.tipe == 'email'){

                tipeelement[i].setAttribute('type','hidden');
                elementopsi.innerHTML = `
                    <div>
                        <div id='at-`+tipeelement[i].id+`'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <input data-padding='right-icon' class='form-control' id='virtual-`+tipeelement[i].id+`' placeholder='`+tipeelement[i].placeholder+`' value='`+tipeelement[i].value+`'>
                    </div>
                `;

                let loadstatus = false;
                let at = el('#at-'+tipeelement[i].id);
                let virtual = el('#virtual-'+tipeelement[i].id);
                virtual.addEventListener('keyup', ()=>{
                    tipeelement[i].value = virtual.value;
                    if(loadstatus == false){
                        at.innerHTML = `<span class='loader-mini'></span>`;
                        loadstatus = true;
                        setTimeout(()=>{
                            const re = /^\w+(?:\.\w+)*@\w+(?:\.\w+)+$/;
                            if(virtual.value.length > 0){
                                if(re.test(virtual.value)) {
                                    at.innerHTML = `
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-success">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    `;
                                }else{
                                    at.innerHTML = `
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-danger">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                    `;
                                }
                            }else{
                                at.innerHTML = `
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                `;
                            }
                            loadstatus = false;
                        },800);
                    }
                });


            }


            /*
                Jikda data-tipe='web'
            */
            if(tipeelement[i].dataset.tipe == 'web'){

                tipeelement[i].setAttribute('type','hidden');
                elementopsi.innerHTML = `
                    <div>
                        <div id='at-`+tipeelement[i].id+`'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                            </svg>
                        </div>
                        <input data-padding='right-icon' class='form-control' id='virtual-`+tipeelement[i].id+`' placeholder='`+tipeelement[i].placeholder+`' value='`+tipeelement[i].value+`'>
                    </div>
                `;

                let loadstatus = false;
                let at = el('#at-'+tipeelement[i].id);
                let virtual = el('#virtual-'+tipeelement[i].id);
                virtual.addEventListener('keyup', ()=>{
                    tipeelement[i].value = virtual.value;
                    if(loadstatus == false){
                        at.innerHTML = `<span class='loader-mini'></span>`;
                        loadstatus = true;
                        setTimeout(()=>{
                            const re = new RegExp(
                                "^(https?:\\/\\/)?" +
                                "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" +
                                "((\\d{1,3}\\.){3}\\d{1,3}))" +
                                "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" +
                                "(\\?[;&a-z\\d%_.~+=-]*)?" +
                                "(\\#[-a-z\\d_]*)?$",
                                "i"
                            );
                            if(virtual.value.length > 0){
                                if(!!re.test(virtual.value)) {
                                    at.innerHTML = `
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-success">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    `;
                                }else{
                                    at.innerHTML = `
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-danger">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                    `;
                                }
                            }else{
                                at.innerHTML = `
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                    </svg>
                                `;
                            }
                            loadstatus = false;
                        },800);
                    }
                });


            }


            /*
                Jikda data-tipe='tanggal'
            */
            if(tipeelement[i].dataset.tipe == 'tanggal'){
                tipeelement[i].setAttribute('type','hidden');
                let dt = new Date();
                let bulan = dt.getMonth() + 1;
                let placeholder = "";
                if(tipeelement[i].value != ""){
                    placeholder = tipeelement[i].value;
                }else{
                    placeholder = dt.getFullYear()+"/"+bulan+"/"+dt.getDate();
                }
                elementopsi.innerHTML = `
                    <div>
                        <div id='at-`+tipeelement[i].id+`'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                        </div>
                        <div type='email' data-klik='`+tipeelement[i].id+`' data-padding='right-icon' class='form-control action' id='virtual-`+tipeelement[i].id+`'>`+placeholder+`</div>
                    </div>
                    <div id='calender-`+tipeelement[i].id+`'>
                        
                    </div>
                `;

                let calender = el('#calender-'+tipeelement[i].id);
                let virtual = el('#virtual-'+tipeelement[i].id);
                virtual.addEventListener('click', ()=>{

                    if(tipeelement[i].value != ""){
                        placeholder = tipeelement[i].value;
                    }else{
                        placeholder = dt.getFullYear()+"/"+bulan+"/"+dt.getDate();
                    }

                    popup[tipeelement[i].id] = calender;

                    let tg = "";
                    for(let angka=1; angka<32; angka++){
                        if(angka < 10){
                            tg += `<option data-klik='`+tipeelement[i].id+`' value='0`+angka+`'>0`+angka+`</option>`;
                        }else{
                            tg += `<option data-klik='`+tipeelement[i].id+`' value='`+angka+`'>`+angka+`</option>`;
                        }
                    }

                    let bl = "";
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='01'>Januari</option>`;
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='02'>Februari</option>`;
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='03'>Maret</option>`;
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='04'>April</option>`;
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='05'>Mei</option>`;
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='06'>Juni</option>`;
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='07'>Juli</option>`;
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='08'>Agustus</option>`;
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='09'>September</option>`;
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='10'>Oktober</option>`;
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='11'>November</option>`;
                    bl += `<option data-klik='`+tipeelement[i].id+`' value='12'>Desember</option>`;

                    let thini = new Date().getFullYear();
                    let th = "";
                    for(let thnitem=1970; thnitem<=thini; thnitem++){
                        th += `<option data-klik='`+tipeelement[i].id+`' value='`+thnitem+`'>`+thnitem+`</option>`;
                    }

                    calender.innerHTML = `
                        <div class='calender'>
                            <div>
                                <div>
                                    <select data-klik='`+tipeelement[i].id+`' onChange='setTgl([this.value,this.dataset.id])' data-id='`+tipeelement[i].id+`' data-tipe='select' class='form-control' style='width: 100%; font-size: 11pt; padding: 8px; border-radius: 0; text-align: center; background: none;' id='tgl'>
                                        <option data-klik='`+tipeelement[i].id+`' value='`+placeholder.split("/")[2]+`'>`+placeholder.split("/")[2]+`</option>
                                        `+tg+`
                                    </select>
                                </div>
                                <div>
                                    <select id='select-bulan-'`+tipeelement[i].id+`' data-klik='`+tipeelement[i].id+`' onChange='setBln([this.value,this.dataset.id])' data-id='`+tipeelement[i].id+`' data-tipe='select' class='form-control' style='width: 100%; font-size: 11pt; padding: 8px; border-radius: 0; text-align: center; background: none; border-top: 1px solid var(--abu); border-bottom: 1px solid var(--abu);' id='bln'>
                                        <option data-klik='`+tipeelement[i].id+`' value='`+placeholder.split("/")[1]+`'>`+bulanTxt(placeholder.split("/")[1])+`</option>
                                        `+bl+`
                                    </select>
                                </div>
                                <div>
                                    <select data-klik='`+tipeelement[i].id+`' onChange='setThn([this.value,this.dataset.id])' data-id='`+tipeelement[i].id+`' onChange='' data-tipe='select' class='form-control' style='width: 100%; font-size: 11pt; padding: 8px; border-radius: 0; text-align: center; background: none;' id='thn'>
                                        <option data-klik='`+tipeelement[i].id+`' value='`+placeholder.split("/")[0]+`'>`+placeholder.split("/")[0]+`</option>
                                        `+th+`
                                    </select>
                                </div>
                            </div>
                            <div>
                                <div id='setBlnView-`+tipeelement[i].id+`'>...</div>
                                <div><span id='setTglView-`+tipeelement[i].id+`'>...</span></div>
                                <div id='setThnView-`+tipeelement[i].id+`'>...</div>
                            </div>
                        </div>
                    `;

                    setThn([placeholder.split("/")[0],tipeelement[i].id]);
                    setBln([placeholder.split("/")[1],tipeelement[i].id]);
                    setTgl([placeholder.split("/")[2],tipeelement[i].id]);

                });

            }


        }


        if(tipeelement[i].tagName == 'SELECT'){
            
            /*
                Jikda data-tipe='SELECT'
            */
            if(tipeelement[i].dataset.tipe == 'select'){
                elementopsi.innerHTML = `
                    <div>
                        <div id='at-`+tipeelement[i].id+`'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                `;
            }

        }
        
    }



    let tglfull = [];
                    
    function setTgl(x) {
        tglfull['tgl'] = x[0];
        el("#setTglView-"+x[1]).innerHTML = tglfull['tgl'];
        if(tglfull['tgl'] == 31){
            el('#select-bulan-'+x[1]).innerHTML = `
                <option data-klik='`+x[1]+`' value=''>Pilih Bulan</option>
                <option data-klik='`+x[1]+`' value='01'>Januari</option>
                <option data-klik='`+x[1]+`' value='03'>Maret</option>
                <option data-klik='`+x[1]+`' value='05'>Mei</option>
                <option data-klik='`+x[1]+`' value='07'>Juli</option>
                <option data-klik='`+x[1]+`' value='08'>Agustus</option>
                <option data-klik='`+x[1]+`' value='10'>Oktober</option>
                <option data-klik='`+x[1]+`' value='12'>Desember</option>
            `;
        }
        resulttgl(x[1]);
    }

    function setBln(x) {
        tglfull['bln'] = x[0];
        let namabulan = bulanTxt(x[0]);
        el("#setBlnView-"+x[1]).innerHTML = namabulan;
        resulttgl(x[1]);
    }

    function bulanTxt(x) {
        let namabulan = "";
        if(x == "01"){
            namabulan = "Januari";
        }
        if(x == "02"){
            namabulan = "Februari";
        }
        if(x == "03"){
            namabulan = "Maret";
        }
        if(x == "04"){
            namabulan = "April";
        }
        if(x == "05"){
            namabulan = "Mei";
        }
        if(x == "06"){
            namabulan = "Juni";
        }
        if(x == "07"){
            namabulan = "Juli";
        }
        if(x == "08"){
            namabulan = "Agustus";
        }
        if(x == "09"){
            namabulan = "September";
        }
        if(x == "10"){
            namabulan = "Oktober";
        }
        if(x == "11"){
            namabulan = "November";
        }
        if(x == "12"){
            namabulan = "Desember";
        }

        return namabulan;
    }

    function setThn(x) {
        tglfull['thn'] = x[0];
        el("#setThnView-"+x[1]).innerHTML = tglfull['thn'];
        resulttgl(x[1]);
    }

    function resulttgl (x) {
        el("#virtual-"+x).innerHTML = tglfull['thn'] + "/" + tglfull['bln'] + "/" + tglfull['tgl'];
        el("#"+x).value = tglfull['thn'] + "/" + tglfull['bln'] + "/" + tglfull['tgl'];
    }
}