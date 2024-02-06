//todo: switching pages
const container = document.querySelector('.container')
const btnSignIn = document.querySelector('.btnSign-in')
const btnSignUp = document.querySelector('.btnSign-up')

btnSignIn.addEventListener('click', () => {
    container.classList.add('active')
})

btnSignUp.addEventListener('click', () => {
    container.classList.remove('active')
})

// todo: show hide password

document.addEventListener('DOMContentLoaded', function () {
    let ShowPassword1 = document.getElementById('eye_1');
    let ShowPassword2 = document.getElementById('eye_2');
    let ShowPassword3 = document.getElementById('eye_3');

    let PasswordField1 = document.getElementById('signin_password');
    let PasswordField2 = document.getElementById('psw_2');
    let PasswordField3 = document.getElementById('psw_3');

    ShowPassword1.addEventListener('click', function () {
        ShowPassword1.classList.toggle('fa-eye');
        const type = PasswordField1.type === 'password' ? 'text' : 'password';
        PasswordField1.type = type;
    });

    ShowPassword2.addEventListener('click', function () {
        ShowPassword2.classList.toggle('fa-eye');
        const type = PasswordField2.type === 'password' ? 'text' : 'password';
        PasswordField2.type = type;
    });

    ShowPassword3.addEventListener('click', function () {
        ShowPassword3.classList.toggle('fa-eye');
        const type = PasswordField3.type === 'password' ? 'text' : 'password';
        PasswordField3.type = type;
    });
});


//todo: عند النقر على زر "Remember Me"

document.getElementById('Remember_me').addEventListener('change', function () {
    if (this.checked) {
        // Utilisez les ID mis à jour pour le champ de mot de passe
        document.cookie = `remembered_email=${encodeURIComponent(document.getElementById('email').value)}; expires=${new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
        document.cookie = `remembered_password=${encodeURIComponent(document.getElementById('signin_password').value)}; expires=${new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
    } else {
        // Utilisez les ID mis à jour pour le champ de mot de passe
        document.cookie = 'remembered_email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        document.cookie = 'remembered_password=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    }
});

// Utilisez le bon sélecteur pour le bouton de connexion
document.getElementById('loginbutton').addEventListener('click', function () {
    // Si "Remember Me" est coché, sauvegardez les informations dans les cookies
    if (document.getElementById('Remember_me').checked) {
        document.cookie = `remembered_email=${encodeURIComponent(document.getElementById('email').value)}; expires=${new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
        document.cookie = `remembered_password=${encodeURIComponent(document.getElementById('signin_password').value)}; expires=${new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
    }
});




