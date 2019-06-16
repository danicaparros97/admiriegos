$(document).ready(function () {
    //Tema sidebar
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    //Al pulsar en el boton para cerrar el sidebar o pulsar en otro lado de la pantalla, el sidebar se desactivara y el overlay se quitara
    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    //Al pulsar en el boton de abrir el sidebar, el sidebar y el overlay se activaran
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    }); 
    
});



