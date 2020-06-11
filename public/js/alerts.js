//CONFIGURACION DE LA ALERTA GLOBAL DE LA PAGINA, TAMAÑO, TIEMPO, ETC..

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true
});

//URL PARA AJAX
const url = 'http://mini_instagram.com.devel';

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

//BOTON DE LIKE
let btnLike = document.querySelectorAll('#btnLike');    //TODOS LOS BOTONES

if(btnLike != null){
    for(let i=0; i < btnLike.length; i++){
        btnLike[i].addEventListener("click", () => {        //AÑADIR FUNCIONALIDAD A CADA UNO
            if(btnLike[i].classList.contains('text-green')){
                axios.get(url + '/like/dislike-post/' + btnLike[i].dataset.id)   //PETICION HTTP QUE QUITA EL LIKE
                .then(function (response){
                    btnLike[i].classList.remove('text-green');
                    btnLike[i].innerHTML = '<i class="fa fa-thumbs-up"></i> ' +  (parseInt(btnLike[i].textContent) - 1); 
                })
                .catch(function(error){
                    console.log(error);
                });
            }else{
                axios.get(url + '/like/like-post/' + btnLike[i].dataset.id)     //PETICION HTTP QUE PONE EL LIKE
                .then(function (response){
                    btnLike[i].classList.add('text-green');
                    btnLike[i].innerHTML = '<i class="fa fa-thumbs-up"></i> ' + (parseInt(btnLike[i].textContent) + 1); 
                })
                .catch(function(error){
                    console.log(error);
                });
            }
        });
    }
}

//FORMULARIO DE COMENTARIOS
let formComment = document.querySelector('#formComment');

if(formComment != null){
    formComment.addEventListener('submit', (event) => {   //EVENTO
        event.preventDefault();     //EVITAR REFRESCO
        var data = new FormData(formComment);                                     
        axios.post(url + '/comment/create', data)    //PETICION HTTP QUE AÑADE UN NUEVO COMENTARIO
            .then((response) => {
                document.querySelector('#cleanInput').value = '';

                //SI SE QUIERE REACTIVO DEBERIA CAPTURAR EL RESPONSE DE ACUERDO A LO QUE SU PLANTILLA MUESTRE Y GENERAR EL HTML DENTRO DEL ELEMENTO

            })
            .catch((error) => {
                console.log(error);
            });
    });
}
