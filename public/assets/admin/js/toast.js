function Toast(x) {

    if (x.closeBtn) {
        // console.log("Close button true");
    } else {
        setTimeout(() => {
            const merror = document.querySelector("#error")
            // const minfo = document.querySelector("#info")
            const msuccess = document.querySelector("#success")
            const mwarning = document.querySelector("#warning")
            if (merror) { merror.setAttribute("class", "error out") }
            // if (minfo) { minfo.setAttribute("class", "info out") }
            if (msuccess) { msuccess.setAttribute("class", "success out") }
            if (mwarning) { mwarning.setAttribute("class", "warning out") }
            let msg = document.querySelector("#toasthere");
            setTimeout(() => {
                msg.innerHTML = "";
            }, 1000);
        }, 4000);
    }


    let svgIcon = ""

    if (x.tipe == "error") {
        svgIcon = `
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 50 50" style="enable-background:new 0 0 50 50; height: 18px; margin-right: 5px;" xml:space="preserve">
        <circle style="fill:#D75A4A;" cx="25" cy="25" r="25"/>
        <polyline style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" points="16,34 25,25 34,16 
            "/>
        <polyline style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" points="16,16 25,25 34,34 
            "/></svg>
        `
    } else if (x.tipe == "success") {
        svgIcon = `
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 50 50" style="enable-background:new 0 0 50 50; height: 18px; margin-right: 5px;" xml:space="preserve">
        <circle style="fill:#65a30d;" cx="25" cy="25" r="25"/>
        <polyline style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" points="
            38,15 22,33 12,25 "/>
        </svg>
        `
    } else if (x.tipe == "warning") {
        svgIcon = `
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931; height: 18px; margin-right: 5px;" xml:space="preserve">
        <circle style="fill:#facc15;" cx="236.966" cy="236.966" r="236.966"/>
        <path style="fill:#fff;" d="M214.399,252.389l-6.698-100.159c-1.257-19.517-1.871-33.526-1.871-42.027
            c0-11.57,3.035-20.602,9.085-27.072c6.065-6.499,14.054-9.74,23.94-9.74c11.996,0,20.022,4.15,24.056,12.445
            c4.034,8.303,6.065,20.258,6.065,35.857c0,9.205-0.494,18.559-1.459,28.022l-8.995,103.089c-0.973,12.277-3.061,21.68-6.279,28.239
            c-3.207,6.544-8.509,9.815-15.888,9.815c-7.536,0-12.756-3.158-15.682-9.512C217.744,275.016,215.645,265.351,214.399,252.389z
            M237.609,389.974c-8.501,0-15.936-2.739-22.267-8.251c-6.346-5.497-9.512-13.197-9.512-23.102c0-8.647,3.035-16.004,9.085-22.069
            c6.065-6.065,13.493-9.092,22.275-9.092c8.786,0,16.269,3.027,22.477,9.092c6.204,6.065,9.31,13.425,9.31,22.069
            c0,9.751-3.136,17.414-9.418,22.997C253.291,387.19,245.976,389.974,237.609,389.974z"/>
        </svg>
        `
    } else {
        svgIcon = `
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 496.158 496.158" style="enable-background:new 0 0 496.158 496.158; height: 18px; margin-right: 5px;" xml:space="preserve">
        <path style="fill:#94a3b8;" d="M496.158,248.085c0-137.022-111.069-248.082-248.075-248.082C111.07,0.003,0,111.063,0,248.085
            c0,137.001,111.07,248.07,248.083,248.07C385.089,496.155,496.158,385.086,496.158,248.085z"/>
        <g>
            <path style="fill:#FFFFFF;" d="M315.249,359.555c-1.387-2.032-4.048-2.755-6.27-1.702c-24.582,11.637-52.482,23.94-57.958,25.015
                c-0.138-0.123-0.357-0.348-0.644-0.737c-0.742-1.005-1.103-2.318-1.103-4.015c0-13.905,10.495-56.205,31.192-125.719
                c17.451-58.406,19.469-70.499,19.469-74.514c0-6.198-2.373-11.435-6.865-15.146c-4.267-3.519-10.229-5.302-17.719-5.302
                c-12.459,0-26.899,4.73-44.146,14.461c-16.713,9.433-35.352,25.41-55.396,47.487c-1.569,1.729-1.733,4.314-0.395,6.228
                c1.34,1.915,3.825,2.644,5.986,1.764c7.037-2.872,42.402-17.359,47.557-20.597c4.221-2.646,7.875-3.989,10.861-3.989
                c0.107,0,0.199,0.004,0.276,0.01c0.036,0.198,0.07,0.5,0.07,0.933c0,3.047-0.627,6.654-1.856,10.703
                c-30.136,97.641-44.785,157.498-44.785,182.994c0,8.998,2.501,16.242,7.432,21.528c5.025,5.393,11.803,8.127,20.146,8.127
                c8.891,0,19.712-3.714,33.08-11.354c12.936-7.392,32.68-23.653,60.363-49.717C316.337,364.326,316.636,361.587,315.249,359.555z"/>
            <path style="fill:#FFFFFF;" d="M314.282,76.672c-4.925-5.041-11.227-7.597-18.729-7.597c-9.34,0-17.475,3.691-24.176,10.971
                c-6.594,7.16-9.938,15.946-9.938,26.113c0,8.033,2.463,14.69,7.32,19.785c4.922,5.172,11.139,7.794,18.476,7.794
                c8.958,0,17.049-3.898,24.047-11.586c6.876-7.553,10.363-16.433,10.363-26.393C321.646,88.105,319.169,81.684,314.282,76.672z"/>
        </svg>
        `
    }

    let msg = document.querySelector("#toasthere")
    if (msg) {
        if (x.tipe == 'konfirmasi') {
            return msg.innerHTML = `
            <style>
            .message { position: fixed; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center; z-index: 9999; }
            .message span { margin-left: 0.5rem; }
            .message .konfirmasi { position: absolute; bottom: -80px; min-width: 300px; max-width: 400px; background: #fff; padding-left: 1rem; padding-right: 1rem; padding-top: 0.75rem; padding-bottom: 0.75rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); border-radius: 0.375rem; display: flex; justify-content: center; align-items: center; font-size: 10pt; font-weight: 600; border-top: 4px solid #243453; }
            .message .konfirmasi div { position: relative; }
            .message .konfirmasi div button { background: #f0f2f5; padding: 10px; border-radius: 4px; }
            .error.in, .info.in, .konfirmasi.in, .success.in, .warning.in { animation-name: animIn; animation-duration: 1s; animation-fill-mode: forwards; } 
            .error.out, .info.out, .konfirmasi.out, .success.out, .warning.out { animation-name: animOut; animation-duration: 1s; animation-fill-mode: both; }
            @keyframes animIn { 0% { bottom: -80px; } 30% { bottom: 80px; } 45% { bottom:30px; } 60% { bottom:70px; } 70% { bottom:40px; } 80% { bottom:60px; } 100% { bottom: 50px; } } 
            @keyframes animOut { 0% {  bottom: 50px; } 30% { bottom: 40px; } 50% { bottom: 60px; } 100% { bottom: -80px; } }
            </style>
            <div class="message">
                <div id="`+ x.tipe + `" class="` + x.tipe + ` in">
                    <div style='position: relative; text-align: center;'>
                        <div style="margin-top: 20px;">
                            <svg style="width: 60px; color: #e22020; "xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <div style='padding: 20px; font-size: 11pt;'>`+ x.message + `</div>
                        <div style='margin-bottom: 1rem;'>
                            <button id='ya' style='background:#243453; color: #fff; margin-right: 2px; font-weight: 600;'>Ya, Hapus.</button>
                            <button id='batal' style="font-weight:600;">Jangan. Batalkan!</button>
                        </div>
                    </div>
                </div>
            </div>
            `;
        }else if (x.tipe == 'logout') {
            return msg.innerHTML = `
            <style>
            .message { position: fixed; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center; z-index: 9999; }
            .message span { margin-left: 0.5rem; }
            .message .logout { position: absolute; bottom: -80px; min-width: 300px; max-width: 400px; background: #fff; padding-left: 1rem; padding-right: 1rem; padding-top: 0.75rem; padding-bottom: 0.75rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); border-radius: 0.375rem; display: flex; justify-content: center; align-items: center; font-size: 10pt; font-weight: 600; border-top: 4px solid #243453; }
            .message .logout div { position: relative; }
            .message .logout div button { background: #f0f2f5; padding: 10px; border-radius: 4px; }
            .error.in, .info.in, .logout.in, .success.in, .warning.in { animation-name: animIn; animation-duration: 1s; animation-fill-mode: forwards; } 
            .error.out, .info.out, .logout.out, .success.out, .warning.out { animation-name: animOut; animation-duration: 1s; animation-fill-mode: both; }
            @keyframes animIn { 0% { bottom: -80px; } 30% { bottom: 80px; } 45% { bottom:30px; } 60% { bottom:70px; } 70% { bottom:40px; } 80% { bottom:60px; } 100% { bottom: 50px; } } 
            @keyframes animOut { 0% {  bottom: 50px; } 30% { bottom: 40px; } 50% { bottom: 60px; } 100% { bottom: -80px; } }
            </style>
            <div class="message">
                <div id="`+ x.tipe + `" class="` + x.tipe + ` in">
                    <div style='position: relative; text-align: center;'>
                        <div>
                            <svg style="width: 60px; color: #e22020; xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                            </svg>
                        </div>
                        <div style='padding: 20px; width: 100%; font-size: 11pt;'>`+ x.message + `</div>
                        <div style='margin-bottom: 1rem;'>
                            <button id='ya' style='background:#243453; color: #fff; margin-right: 2px; font-weight: 600;'>Ya</button>
                            <button id='batal' style="font-weight:600;">Gak jadi!</button>
                        </div>
                    </div>
                </div>
            </div>
            `;
        } else {
            return msg.innerHTML = `
            <style>
            .message { position: fixed; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center; z-index: 9999; }
            .message span { margin-left: 0.5rem; }
            .message .success { position: absolute; bottom: -80px; max-width: 400px; background: #fff; padding-left: 1rem; padding-right: 1.75rem; padding-top: 0.75rem; padding-bottom: 0.75rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); border-radius: 0.375rem; display: flex; justify-content: center; align-items: center; font-size: 10pt; font-weight: 600; border-left: 4px solid #65a30d; }
            .message .info { position: absolute; bottom: -80px; max-width: 400px; background: #fff; padding-left: 1rem; padding-right: 1.75rem; padding-top: 0.75rem; padding-bottom: 0.75rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); border-radius: 0.375rem; display: flex; justify-content: center; align-items: center; font-size: 10pt; font-weight: 600; border-left: 4px solid #94a3b8; }
            .message .warning { position: absolute; bottom: -80px; max-width: 400px; background: #fff; padding-left: 1rem; padding-right: 1.75rem; padding-top: 0.75rem; padding-bottom: 0.75rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); border-radius: 0.375rem; display: flex; justify-content: center; align-items: center; font-size: 10pt; font-weight: 600; border-left: 4px solid #facc15; }
            .message .error { position: absolute; bottom: -80px; max-width: 400px; background: #fff; padding-left: 1rem; padding-right: 1.75rem; padding-top: 0.75rem; padding-bottom: 0.75rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); border-radius: 0.375rem; display: flex; justify-content: center; align-items: center; font-size: 10pt; font-weight: 600; border-left: 4px solid #dc2626; }
            .error.in, .info.in, .success.in, .warning.in { animation-name: animIn; animation-duration: 1s; animation-fill-mode: forwards; } 
            .error.out, .info.out, .success.out, .warning.out { animation-name: animOut; animation-duration: 1s; animation-fill-mode: both; }
            @keyframes animIn { 0% { bottom: -80px; } 30% { bottom: 80px; } 45% { bottom:30px; } 60% { bottom:70px; } 70% { bottom:40px; } 80% { bottom:60px; } 100% { bottom: 50px; } } 
            @keyframes animOut { 0% {  bottom: 50px; } 30% { bottom: 40px; } 50% { bottom: 60px; } 100% { bottom: -80px; } }
            </style>
            <div class="message">
                <div id="`+ x.tipe + `" class="` + x.tipe + ` in">
                    `+ svgIcon + `
                    <span>`+ x.message + `</span>
                </div>
            </div>
            `;
        }

    }
}