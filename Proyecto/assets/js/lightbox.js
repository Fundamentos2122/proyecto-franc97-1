const imagenes = document.querySelectorAll('.img-galeria');
const imagenesLight = document.querySelector('.agregar-imagen');
const contenedorLight = document.querySelector('.imagen-light');


// console.log(imagenes);
// console.log(imagenesLight);
// console.log(contenedorLight);

imagenes.forEach(div =>{
    div.addEventListener('click', ()=>{
        // alert("auch, me dolio"); lanza el mensage cada que se preciones una imagen de la galleria
        aparecerImagen(div.getAttribute('src'));
    });
});


//Funcion para cerrar el previzualizador de galeria
contenedorLight.addEventListener('click', (e)=>{
    // console.log(e.target);
    if(e.target !== imagenesLight){
        contenedorLight.classList.toggle('show'); //Agrega y quita clase show
        imagenesLight.classList.toggle('showImage');
    }
})


//Funcion que permite vizualizar las imagenes de galeria 
const aparecerImagen = (div)=>{
    imagenesLight.src = div;
    contenedorLight.classList.toggle('show'); //Agrega y quita clase show
    imagenesLight.classList.toggle('showImage');

}