const bg = document.querySelector('.auth-reg'),
    fromAuth = document.querySelector('.form_auth'),
    fromReg = document.querySelector('.form_reg'),
    authBtn = document.getElementById("auth"),
    regBtn = document.getElementById("reg");

authBtn.addEventListener('click', function() {
    fromAuth.style.opacity = 1;
    fromAuth.style.visibility = 'visible';

    fromReg.style.opacity = 0;
    fromReg.style.visibility = 'hidden';

    bg.style.backdropFilter = 10 + 'px';
});

regBtn.addEventListener('click', function() {
    fromAuth.style.opacity = 0;
    fromAuth.style.visibility = 'hidden';

    fromReg.style.opacity = 1;
    fromReg.style.visibility = 'visible';
    bg.style.backdropFilter = 20 + 'px';
});