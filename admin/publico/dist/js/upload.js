function validarExt()
{
    var archivoInput = document.getElementById('image');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.pdf|.PDF|.png|.PNG|.jpg|.JPG)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado una Imagen');
        archivoInput.value = '';
        return false;
    }

    else
    {
        //PRevio del PDF
        if (archivoInput.files && archivoInput.files[0]) 
        {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
                document.getElementById('visorArchivo').innerHTML = 
                '<embed src="'+e.target.result+'" width="280px" height="auto" />';
            };
            visor.readAsDataURL(archivoInput.files[0]);
        }
    }
    if (archivoRu=="") {
      alert
    }
}