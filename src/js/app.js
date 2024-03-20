// Escuchamos que el documento este cargado tanto el HTML,CSS y el JS
document.addEventListener('DOMContentLoaded', function(){
    eventListener();

    darkMode();
});

function darkMode(){
    const botonDarkMode=document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');

        // const prefiereDarkMode = window.matchMedia('(perfers-color-scheme: dark)');
        // if(prefiereDarkMode.matches){
        //     document.body.classList.add('dark-mode');
        // }else{
        //     document.body.classList.remove('dark-mode');
        // }
    });
}

function eventListener(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click',navegacionResponsive);
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    // navegacion.classList.toggle('mostrar')
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar')
    }else{
        navegacion.classList.add('mostrar')
    }
}