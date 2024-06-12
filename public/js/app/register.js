document.addEventListener('DOMContentLoaded', function () {
    const passwordInput2 = document.getElementById('inputPassword');
    const tog2 = document.getElementById('tog2');
    const terbuka2 = document.getElementById('terbuka2');
    const tertutup2 = document.getElementById('tertutup2');
    tog2.addEventListener('click', function () {
        if (passwordInput2.type === 'password') {
            terbuka2.style.display = 'block';
            tertutup2.style.display = 'none';
            passwordInput2.type = 'text';
        } else {
            terbuka2.style.display = 'none';
            tertutup2.style.display = 'block';
            passwordInput2.type = 'password';
        }
    });
});
