<<<<<<< HEAD
document.addEventListener('DOMContentLoaded', function () {

    eventListener();

    darkMode();
});

function eventListener() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
};
=======
document.addEventListener("DOMContentLoaded", function () {

    eventListeners();
});

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}
>>>>>>> ceed0fc793daccb1dbd7bf704acadc620275bf2d

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

<<<<<<< HEAD
    if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar')
    } else {
        navegacion.classList.add('mostrar')
    }
}

function darkMode(){

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    //console.log(prefiereDarkMode.matches);

    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode')
    }else{
        document.body.classList.remove('dark-mode')
    }

    prefiereDarkMode.addEventListener('change', function(){
        if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode')
    }else{
        document.body.classList.remove('dark-mode')
    }
    })

    const btnDarkMode = document.querySelector('.dark-mode-boton');
    btnDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
=======
    navegacion.classList.toggle('mostrar');
    // if (navegacion.classList.contains('mostrar')) {
    //     navegacion.classList.remove('mostrar');
    // }else{
    //     navegacion.classList.add('mostrar');
    // }
>>>>>>> ceed0fc793daccb1dbd7bf704acadc620275bf2d
}