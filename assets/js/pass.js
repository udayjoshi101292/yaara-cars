const PassProt = () => {

    const isValidated = localStorage.getItem('validated');

    let val = null;

    console.log(isValidated)

    if (isValidated === null) {
        const Password = prompt('Can you confirm Password');
        if (Password === 'admin@1234567890') {
            val = '1';
        }
        else {
            val = '0';
        }
        localStorage.setItem('validated', val);

    }
    console.log(isValidated);
    if (isValidated !== "1") {
        console.log("here");

        document.body.remove();
    }
    else {

        document.body.style.display = "block";
    }
}
PassProt();
//     const isValidated = localStorage.getItem('validated');

// document.body.style.display = "block";
// if (isValidated !== null) {
//     localStorage.setItem('validated', '')
// }