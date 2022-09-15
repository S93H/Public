// function validation() {
//     let mail = document.getElementById("mail");
//     let pwd = document.getElementById("pwd");

//     if (mail.value == "" || pwd.value == "")  {
//         alert("Veuillez renseigner tous les champs");
//     } else {

//     }
// }

let form = document.querySelector("#login_form");

form.email.addEventListener('change', function() {
    validEmail(this);
});

form.password.addEventListener('change', function() {
    validPwd(this);
})


const validEmail = function(inputEmail) {
    let emailRegExp = new RegExp(
        '^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$', 'g'
    );

    let testEmail = emailRegExp.test(inputEmail.value);
    let small = inputEmail.nextElementSibling;

    if (testEmail) {
        small.innerHTML = 'Adresse Valide';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
    } else {
        small.innerHTML = 'Adresse non Valide';
        small.classList.remove('text-success')
        small.classList.add('text-danger');
    }
};

const validPwd = function(inputpwd) {
    let msg;
    let valid = false;
    // Au moins 3 caractères
    if (inputpwd.value.length < 6) {
        msg = 'Le mot de passe doit contenir au moins 6 caractères';
        // Au moins 1 majuscule
    } else if (!/[A-Z]/.test(inputpwd.value)) {
        msg = 'Le mot de passe doit contenir au moins 1 majuscule';
    } else if (!/[a-z]/.test(inputpwd.value)) {
        msg = 'Le mot de passe doit contenir au moins 1 minuscule';
    } else if (!/[0-9]/.test(inputpwd.value)) {
        msg = 'Le mot de passe doit contenir au moins 1 chiffre';
    } else {
        msg = 'Mot de passe valide';
        valid = true;
    }

    let small = inputpwd.nextElementSibling;

    if (valid) {
        small.innerHTML = 'Mot de passe Valide';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
    } else {
        small.innerHTML = 'Mot de passe non Valide';
        small.classList.remove('text-success')
        small.classList.add('text-danger');
    }

    console.log(msg);
}