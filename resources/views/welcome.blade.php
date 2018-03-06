<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BotMan Studio</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        body {
            font-family: "Varela Round", sans-serif;
            margin: 0;
            padding: 0;
            background: radial-gradient(#57bfc7, #45a6b3);
        }

        .container {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .content {
            text-align: center;
        }

        .logo {
            margin-right: 40px;
            margin-bottom: 20px;
        }

        .links a {
            font-size: 1.25rem;
            text-decoration: none;
            color: white;
            margin: 10px;
        }

        @media all and (max-width: 500px) {

            .links {
                display: flex;
                flex-direction: column;
            }
        }

        .fb-livechat,.fb-widget{display:none; }
        .ctrlq.fb-button,.ctrlq.fb-close{position:fixed;right:24px;cursor:pointer}
        .ctrlq.fb-button{z-index:1;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;width:60px;height:60px;text-align:center;bottom:24px;border:0;outline:0;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;-ms-border-radius:60px;-o-border-radius:60px;box-shadow:0 1px 6px rgba(0,0,0,.06),0 2px 32px rgba(0,0,0,.16);-webkit-transition:box-shadow .2s ease;background-size:80%;transition:all .2s ease-in-out}
        .ctrlq.fb-button:focus,.ctrlq.fb-button:hover{transform:scale(1.1);box-shadow:0 2px 8px rgba(0,0,0,.09),0 4px 40px rgba(0,0,0,.24)}
        .fb-widget{background:#fff;z-index:10000;position:fixed;width:360px;height:435px;overflow:hidden;opacity:0;bottom:0;right:24px;border-radius:6px;-o-border-radius:6px;-webkit-border-radius:6px;box-shadow:0 5px 40px rgba(0,0,0,.16);-webkit-box-shadow:0 5px 40px rgba(0,0,0,.16);-moz-box-shadow:0 5px 40px rgba(0,0,0,.16);-o-box-shadow:0 5px 40px rgba(0,0,0,.16)}
        @media (max-width: 360px) {
        .fb-widget{right:0;bottom:24px;}
        }
        .fb-credit{text-align:center;margin-top:8px}
        .fb-credit a{transition:none;color:#bec2c9;font-family: 'dosisextralight';font-size:12px;text-decoration:none;border:0;font-weight:400}
        .ctrlq.fb-overlay{z-index:0;position:fixed;height:100vh;width:100vw;-webkit-transition:opacity .4s,visibility .4s;transition:opacity .4s,visibility .4s;top:0;left:0;background:rgba(0,0,0,.05);display:none}
        .ctrlq.fb-close{z-index:4;padding:5px 10px;background:#365899;font-weight:700;font-size:14px;color:#fff;margin:8px;border-radius:3px}
        .ctrlq.fb-close::after{content:'Fermer';
    </style>

    <script type="text/javascript">
        /**
        * Initialise messenger chat
        */
        window.fbAsyncInit = function() {
            FB.init({
                appId            : 'EAANCy1JmdvoBAFXIbsbJaKaJTYr5eQlGZChr5xquRviTopF2A5ZC8ZAPqSZCaNFkQtFNwdHc5M34ywvDiBKIqxd7rzsOJiTlLyEQM22yG2JXdha05zLsjxoikmIrT0iEtZA9Kx3kvkbJ1aDDCzJSyw6jJobHKIjb6FZCNeNZC9zLwZDZD',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v2.11'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/fr_FR/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body>
<div class="container">
    <div class="content">
        <img src="https://www.communiti.corsica/images/photographer/logo-ent_w.png">
        <div class="logo">
            <svg viewBox="0 0 225 212" width="300" height="300" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style>.st0{fill:url(#SVGID_1_);} .st1{fill:url(#SVGID_2_);} .st2{fill:url(#SVGID_3_);} .st3{fill:url(#SVGID_4_);} .st5{fill:#FDD800;} .st6{fill:none;stroke:#231F20;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st7{fill:none;stroke:#EB0D8C;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st8{fill:none;stroke:#4EC3C8;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st9{fill:#FFFFFF;stroke:#4EC3C8;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st10{fill:#4EC3C8;} .st11{fill:none;stroke:#49C8F5;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st12{fill:none;stroke:#FEDA00;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st13{fill:#231F20;} .st14{fill:#DBDAD9;stroke:#193946;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st15{fill:none;stroke:#193946;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st16{fill:#F8B232;stroke:#193946;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st17{fill:#FFFFFF;stroke:#193946;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st18{fill:#193946;} .st19{fill:none;stroke:#F1F2F2;stroke-width:4;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st20{clip-path:url(#XMLID_10_);fill:none;stroke:#E4E5E6;stroke-width:33;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st21{clip-path:url(#XMLID_11_);fill:none;stroke:#E4E5E6;stroke-width:33;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st22{clip-path:url(#XMLID_11_);fill:none;stroke:#E4E5E6;stroke-width:25;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st23{clip-path:url(#XMLID_12_);fill:none;stroke:#BE8A25;stroke-width:4;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st24{clip-path:url(#XMLID_13_);fill:none;stroke:#BE8A25;stroke-width:5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st25{fill:none;stroke:#F1F2F2;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st26{fill:none;stroke:#F8B232;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st27{clip-path:url(#XMLID_14_);fill:none;stroke:#E4E5E6;stroke-width:33;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st28{clip-path:url(#XMLID_15_);fill:none;stroke:#E4E5E6;stroke-width:33;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st29{clip-path:url(#XMLID_15_);fill:none;stroke:#E4E5E6;stroke-width:25;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st30{clip-path:url(#XMLID_16_);fill:none;stroke:#BE8A25;stroke-width:4;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st31{clip-path:url(#XMLID_17_);fill:none;stroke:#BE8A25;stroke-width:5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st32{fill:#FEDA00;} .st33{fill:#FFFFFF;stroke:#FEDA00;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st34{fill:#49C8F5;} .st35{fill:#EB0D8C;} .st36{fill:#FFFFFF;stroke:#EB0D8C;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st37{fill:#F8B232;} .st38{fill:#FFFFFF;stroke:#F8B232;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st39{fill:#DBDAD9;} .st40{fill:none;stroke:#DBDAD9;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st41{fill:#FFFFFF;stroke:#DBDAD9;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st42{fill:#DBDAD9;stroke:#193946;stroke-width:6;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><title>background</title><path fill="none" id="canvas_background" d="M-1-1h227v214H-1z"/><title>Layer 1</title><g id="Layer_2"><path id="svg_2" d="M62.9 40.3c1.6-5 7.9-8.6 13.5-7.6" class="st15"/><path id="svg_3" d="M184.6 34.1c4.9-2 11.7.5 14.5 5.4" class="st15"/><path id="svg_4" d="M165.9 117.9c.7-.1 1.2-.2 2-.2 6.2 0 11.2 5 11.2 11.2 0 6.2-5 11.2-11.2 11.2-.7 0-1.3-.1-2-.2" class="st14"/><path id="svg_5" d="M94.2 117.9c-.7-.1-1.2-.2-2-.2-6.2 0-11.2 5-11.2 11.2 0 6.2 5 11.2 11.2 11.2.7 0 1.3-.1 2-.2" class="st14"/><path id="svg_17" d="M109.2 45.4c.2-14.6 3.8-20 9.5-24.5" class="st14"/><circle id="svg_18" r="7.7" cy="13.3" cx="126.3" class="st16"/><g id="svg_19"><defs transform="translate(-62 -82.5)"><path d="M218.5 246.9h-53.2c-4.8 0-8.7-3.9-8.7-8.7v-42.3h70.6v42.3c0 4.8-3.9 8.7-8.7 8.7z" id="XMLID_4_"/></defs><use x="-62" y="-82.5" id="svg_20" fill="#DBDAD9" xlink:href="#XMLID_4_"/><clipPath transform="translate(-62 -82.5)" id="XMLID_10_"><use id="svg_21" xlink:href="#XMLID_4_"/></clipPath><use x="-62" y="-82.5" id="svg_23" fill="none" stroke="#193946" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" xlink:href="#XMLID_4_"/></g><path id="svg_24" class="st14" d="M146 133.2l10.8.1"/><path id="svg_25" d="M179.6 127.8c16.6 0 20.8 20.1 20.8 20.1" class="st15"/><path id="svg_26" class="st15" d="M215.9 163l-.2-11.1-15.2-4-11.9 11.2 8.6 11.1"/><path id="svg_27" d="M80.8 132c-14.6 7.9-29-9.6-29-9.6" class="st15"/><path id="svg_28" class="st15" d="M31.1 116.6l5.4 9.6 15.3-3.7 5.1-15.6-12.9-5.5"/><path id="svg_29" class="st14" d="M108.1 164.4h15v26.8h-15z"/><path id="svg_30" class="st14" d="M138.6 164.4h15v26.8h-15z"/><path id="svg_31" d="M168.2 203.8h-29.6v-12.6h22.1c4.1 0 7.5 3.3 7.5 7.5v5.1z" class="st14"/><path id="svg_32" d="M93.3 203.8h29.8v-12.6h-22.3c-4.1 0-7.5 3.3-7.5 7.5v5.1z" class="st14"/><g id="svg_33"><g id="svg_34"><defs transform="translate(-62 -82.5)"><path d="M246.8 184.5H139.7c-2.8 0-5.1-2.3-5.1-5.1v-46.3c0-2.8 2.3-5.1 5.1-5.1h107.2c2.8 0 5.1 2.3 5.1 5.1v46.3c0 2.8-2.3 5.1-5.2 5.1z" id="XMLID_3_"/></defs><use x="-62" y="-82.5" id="svg_35" fill="#DBDAD9" xlink:href="#XMLID_3_"/><clipPath transform="translate(-62 -82.5)" id="XMLID_11_"><use id="svg_36" xlink:href="#XMLID_3_"/></clipPath><use x="-62" y="-82.5" id="svg_39" fill="none" stroke="#193946" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" xlink:href="#XMLID_3_"/></g><path id="svg_40" d="M147.4 74.5c-3.8 4.5-9.5 7.3-15.9 7.3-6.7 0-12.7-3.1-16.5-8" class="st15"/></g><g id="svg_45"><path id="svg_46" d="M53.9 65.6c7.1 8.2 6.3 20.7-1.9 27.8l-1.5 1.2c-.4.3-.8.6-1.3.8-2.2 1.3-3.6 3.4-4.1 5.9l-4.7 28.1c-.4 2.5.3 5 1.9 6.9 7 8.3 5.9 20.8-2.5 27.7-.4.3-.8.7-1.3 1-.5.4-1.1.7-1.6 1-1.3.7-2.9.7-4.1-.2-1.3-.9-1.9-2.4-1.6-3.9l1.4-8c.3-1.7-.8-3.3-2.5-3.5l-6.1-1c-1.7-.2-3.2.9-3.5 2.5l-1.4 8c-.3 2.1-2.3 3.6-4.5 3.3-.9-.1-1.7-.6-2.3-1.3-7.1-8.2-6.2-20.7 2-27.8l1.5-1.2c.4-.3.8-.6 1.3-.8 2.2-1.3 3.6-3.4 4.1-5.9l4.7-28.1c.4-2.5-.3-5-1.9-6.9-7-8.3-5.9-20.8 2.5-27.7.9-.7 1.8-1.4 2.9-2 1.3-.8 2.9-.7 4.1.2 1.3.9 1.9 2.4 1.6 3.9l-1.4 8.1c-.3 1.7.8 3.2 2.5 3.5l6.1 1c1.7.2 3.2-.9 3.5-2.5l1.4-8c.3-2.1 2.3-3.6 4.5-3.3.8.1 1.6.5 2.2 1.2z" class="st7"/></g><path id="svg_47" class="st14" d="M56.9 106.9L44 101.4"/><g id="svg_51"><defs transform="translate(-62 -82.5)"><path id="XMLID_2_" d="M201.9 195.9l-8.7 5.3-8-5.3 1.7-11.4h13.5z"/></defs><use x="-62" y="-82.5" id="svg_52" fill="#F8B232" xlink:href="#XMLID_2_"/><clipPath transform="translate(-62 -82.5)" id="XMLID_12_"><use id="svg_53" xlink:href="#XMLID_2_"/></clipPath><use x="-62" y="-82.5" id="svg_55" fill="none" stroke="#193946" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" xlink:href="#XMLID_2_"/></g><g id="svg_56"><defs transform="translate(-62 -82.5)"><path id="XMLID_1_" d="M193.2 200.4l9.3 27.4-9.3 11.1-10-11.1z"/></defs><use x="-62" y="-82.5" id="svg_57" fill="#F8B232" xlink:href="#XMLID_1_"/><clipPath transform="translate(-62 -82.5)" id="XMLID_13_"><use id="svg_58" xlink:href="#XMLID_1_"/></clipPath><use x="-62" y="-82.5" id="svg_61" fill="none" stroke="#193946" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" xlink:href="#XMLID_1_"/></g><path id="svg_62" class="st19" d="M142.9 156.4h-1.1"/><path id="svg_63" class="st25" d="M147.4 177.8v-7.6"/><path id="svg_64" d="M157.1 143.6v9.1c0 2-1.7 3.7-3.7 3.7h-4.9" class="st19"/><path id="svg_65" class="st19" d="M108.1 121.4H103v4.1"/></g><g id="svg_68"><path id="svg_67" d="M173.4 68.8c0 6.3-.6 11.5-6.4 11.5s-6.4-5.1-6.4-11.5 1.2-11.5 6.4-11.5c5.2.1 6.4 5.2 6.4 11.5z" class="st18"/></g><g id="svg_70"><path id="svg_69" d="M102.4 69.8c0 6.3-.6 11.5-6.4 11.5s-6.4-5.1-6.4-11.5 1.2-11.5 6.4-11.5c5.2.1 6.4 5.2 6.4 11.5z" class="st18"/></g></svg>
        </div>

        <div class="links">
            <a href="/botman/tinker">Botman web test</a>
            <a href="https://botman.io/docs" target="_blank">Documentation</a>
        </div>
    </div>

    <div class="fb-customerchat" page_id="1017293575071191" ref="batman" minimized="true"></div>
</div>
</body>
</html>