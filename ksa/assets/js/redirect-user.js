
const getCookie = ($val) => {
    const cookies = document.cookie.split(";");
    const cookie = cookies.filter((c) => {
        return c.includes($val);
    });

    if (Array.isArray(cookie) && cookie.length !== 0) {
        return cookie[0].split("=").splice(-1).toString().replace(/%2F/g, "/");
    } else {
        return null;
    }
};

const deleteCookie = (name) => {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/';
}

const domain = window.location.host.split('.').splice(1).join('.');

const SeCookie = (domain) => {
    const Url = window.location.origin;
    const Location = (Url.split('/').slice(-1).pop().split('.')[0].toLowerCase());

    if (!Url.includes(Location)) {
        return;

    }

    const LocationCookie = getCookie('location');
    const MovetoCookie = getCookie('moveto');

    if (LocationCookie !== null) {
        return;
    }

    if (MovetoCookie !== null) {
        return;
    }

    if (Url.includes(Location)) {
        const now = new Date();
        // const expiration = new Date(now.getTime() + (60 * 1000))
        const expiration = new Date(now.getTime() + (30 * 24 * 60 * 60 * 1000))
        document.cookie = `location=${Location}; expires=${expiration.toUTCString()}; path=/; domain=${domain}`;
        document.cookie = `moveto=${Url}; expires=${expiration.toUTCString()}; path=/; domain=${domain}`;
        // document.cookie = `setby=load; expires=${expiration.toUTCString()}; path=/; domain=${domain}`;

    }
}

const SetSelectCookie = (name, domain) => {

    const setbyCookie = getCookie('setby');

    if (setbyCookie !== null) {

        deleteCookie('setby');
    }

    const now = new Date();
    const expiration = new Date(now.getTime() + (30 * 24 * 60 * 60 * 1000))
    document.cookie = `setby=${name}; expires=${expiration.toUTCString()}; path=/; domain=${domain}`;
}


const IfCookieIsSetMoveToSite = () => {

    const BaseDomain = getCookie('moveto');
    const CheckSetBy = (getCookie('setby') !== null) ? (getCookie('setby')).toLowerCase() : null;

    if (CheckSetBy === 'select') {
        return;
    }

    if (BaseDomain !== null) {
        console.log(`I Should be redirected to ${BaseDomain}`);
        if (window.location.origin === BaseDomain) {
            return;
        }
        else {
            document.referrer === '';
            window.location.href = BaseDomain;
        }
    }
}


const CheckCookieExists = getCookie('location');
if (CheckCookieExists === null) {
    SeCookie(domain);
}
else {


    const urlParams = new URLSearchParams(window.location.search);
    console.log(urlParams)
    if(urlParams.size > 0){
        const data = urlParams.get('hereby').toLowerCase();
        
        if (data === 'select') {
            SetSelectCookie('select', domain);
            
            
        }
        else {
            SetSelectCookie('load', domain);
        }


        
        const NEWURL = new URL(window.location.href);

       
        NEWURL.searchParams.delete('hereby');

        
        window.history.replaceState({}, '', NEWURL);
        
    }
    else{
        // SetSelectCookie('load', domain);

    }




    // IfCookieIsSetMoveToSite(CheckCookieExists);


}





jQuery(document.body).on("change", "#select-location", function () {
    console.log("rrrr");




    console.log(`Rediect To: ${window.location.protocol}//${(jQuery(this).val()).toLowerCase()}.${domain}`)


    window.location.href = `${window.location.protocol}//${(jQuery(this).val()).toLowerCase()}.${domain}?hereby=select`;
})



