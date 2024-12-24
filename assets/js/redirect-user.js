//redirect user

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


const CheckCookieExists = getCookie('location');
const TakeMeTo = getCookie('moveto');
if (
    (CheckCookieExists !== null && CheckCookieExists !== '' && CheckCookieExists !== undefined)
    &&
    (TakeMeTo !== null && TakeMeTo !== '' && TakeMeTo !== undefined)
    &&
    (window.location.pathname === '/')
) {

    console.log(`Redirect To: ${TakeMeTo}`);

    // window.location.replace(TakeMeTo)
    
}