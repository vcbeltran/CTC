/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    function funcion_confirmar(url) {
                    swal({
                      title: "¿Seguro que desea eliminar?",
                      text: "Si acepta eliminará el registro",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                            //window.location.href=url;

                            swal("Procediendo a eliminar....", {
                                            icon: "success",
                            });
                            setTimeout(function(){ window.location.href=url; }, 1500);

                      } else {
                            swal("Canceló la operación");
                      }
                    });

            }
