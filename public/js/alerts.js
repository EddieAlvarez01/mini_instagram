//CONFIGURACION DE LA ALERTA GLOBAL DE LA PAGINA, TAMAÑO, TIEMPO, ETC..

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true
});

//BOTON DE CERRAR SESIÓN
let btnLogout = document.querySelector('#btnLogout');

if(btnLogout != null){

    //LISTENER DEL BOTON
    btnLogout.addEventListener("click", () => {
        document.querySelector('#logout-f').submit();
    });
}

//BOTON PARA CREAR PUBLICACIONES O SUBIR IMAGENES (ABRE UN PANEL)
let btnImage = document.querySelector('#btnImage');
if(btnImage != null){
    btnImage.addEventListener("click", () => {
        let input = document.createElement('INPUT');
        input.setAttribute("type", 'file');
        input.setAttribute('name', 'image');
        let innerDiv = document.createElement('DIV');
        innerDiv.classList.add('form-group');
        innerDiv.appendChild(input);
        let div = document.createElement('DIV');
        div.classList.add('col-md-7');
        div.classList.add('col-sm-7');
        div.appendChild(innerDiv);
        document.querySelector('form[name="form-publish"]').appendChild(div); //SELECCIONA EL FORMULARIO POR SU NOMBRE Y LE AGREGA EL DIV CON EL INPUT
    });
}
