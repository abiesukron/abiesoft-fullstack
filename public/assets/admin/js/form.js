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
                        <input type='password' data-model='password' class='form-control' id='virtual-`+tipeelement[i].id+`' name='virtual-`+tipeelement[i].name+`' placeholder='`+tipeelement[i].placeholder+`'>
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

        }
        
    }
}