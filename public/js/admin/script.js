document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('InputPassword');
    const tog = document.getElementById('tog');
    const terbuka = document.getElementById('terbuka');
    const tertutup = document.getElementById('tertutup');
    tog.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            terbuka.style.display = 'block';
            tertutup.style.display = 'none';
            passwordInput.type = 'text';
            passwordInput2.type = 'text';
        } else {
            terbuka.style.display = 'none';
            tertutup.style.display = 'block';
            passwordInput.type = 'password';
            passwordInput2.type = 'password';
        }
    });
});
