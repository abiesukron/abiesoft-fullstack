function validasi(x) {
    let form = el("#"+x.formID);
    if(form){     
        let arrayForm = x.validate;
        for(let i=0; i<arrayForm.length; i++){
            let id = arrayForm[i].split("|")[0];
            let functionName = arrayForm[i].split("|")[1];
            let fn = window[functionName];
            if(fn(el("#"+id).value)){
                Toast({
                    tipe: 'error',
                    message: el("#"+id).parentElement.children[0].innerHTML +" "+ fn(el("#"+id).value)
                });

                if(el("#"+id).nodeName == "TEXTAREA" && el("#"+id).dataset.tipe == "editor-only" ){
                    el("#"+id).parentElement.children[2].children[0].focus();
                    el("#"+id).parentElement.classList.add('form-error');
                }else if(el("#"+id).nodeName == "TEXTAREA" && el("#"+id).dataset.tipe == "editor"){
                    el("#"+id).parentElement.children[2].children[el("#"+id).parentElement.children[2].children.length-1].focus();
                    el("#"+id).parentElement.classList.add('form-error');
                }else if(el("#"+id).dataset.tipe == "tag"){
                    el("#"+id).parentElement.children[2].children[1].focus();
                    el("#"+id).parentElement.classList.add('form-error');
                }else{
                    if(el("#virtual-"+id)){
                        el("#virtual-"+id).focus();
                    }else{
                        el("#"+id).focus();
                    }
                    el("#"+id).parentElement.classList.add('form-error');
                }
                return false;
            }
        }
        return true;
    }
}

function setPilihan(txt) {
    if (txt == "" || txt == null) {
        const status = "belum dipilih";
        return status;
    }
}

function setClean(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    }
}

function setSimpel(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 0) {
        const status = "minimal 1 huruf";
        return status;
    }
}

function setText(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        const status = "minimal 4 huruf";
        return status;
    }
}

function validateEmail(email) {
    // const re =
    //     /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const re = /^\w+(?:\.\w+)*@\w+(?:\.\w+)+$/;
    return re.test(email);
}

function validateUrl(url) {
    const pattern = new RegExp(
        "^(https?:\\/\\/)?" +
        "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" +
        "((\\d{1,3}\\.){3}\\d{1,3}))" +
        "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" +
        "(\\?[;&a-z\\d%_.~+=-]*)?" +
        "(\\#[-a-z\\d_]*)?$",
        "i"
    );
    return !!pattern.test(url);
}

function setEmail(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        const status = "minimal 4 huruf";
        return status;
    } else if (!validateEmail(txt)) {
        const status = "tidak sesuai format";
        return status;
    }
}

function setUrl(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        const status = "minimal 4 huruf";
        return status;
    } else if (!validateUrl(txt)) {
        const status = "format url salah";
        return status;
    }
}

function setAngka(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        const status = "minimal 4 angka";
        return status;
    } else if (isNaN(txt)) {
        const status = "harus angka";
        return status;
    }
}

function setAngkaOnly(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (isNaN(txt)) {
        const status = "harus angka";
        return status;
    }
}

function setNoHp(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 9) {
        const status = "minimal 8 angka";
        return status;
    } else if (isNaN(txt)) {
        const status = "harus angka";
        return status;
    }
}

function setUsia(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt < 1) {
        const status = "minimal 1 tahun";
        return status;
    } else if (isNaN(txt)) {
        const status = "harus angka";
        return status;
    }
}

function setKtp(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 15) {
        const status = "harus 16 angka";
        return status;
    } else if (isNaN(txt)) {
        const status = "harus angka";
        return status;
    }
}