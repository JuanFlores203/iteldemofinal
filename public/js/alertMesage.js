function goodSave(){
    valor = document.getElementById("razon").value;
    valor1 = document.getElementById("fecha_emision").value;
    valor2 = document.getElementById("certificado_code").value;
    valor3 = document.getElementById("nombre_est").value;
    valor4 = document.getElementById("apellido_est").value;
    valor5 = document.getElementById("estudiante_code").value;
    valor6 = document.getElementById("descripcion").value;
    valor7 = document.getElementById("documento").value;

        if( valor.length == 0 || valor1 .length == 0 || valor2 .length == 0 || valor3.length == 0 || valor4.length == 0 || valor5.length == 0 || valor6.length == 0 )
        {

            
        }
        else{
            swal("Guardar", "¡Guardado exitoso!", "success");
        }
        // if( elementos == null || valor.length == 0 || /^\s+$/.test(valor) )
}

function deleteMesage(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
            //   Swal.fire(
            //     'Deleted!',
            //     'Your file has been deleted.',
            //     'success'
            //   )

            this.submit();
            }
        })
        
    
}





