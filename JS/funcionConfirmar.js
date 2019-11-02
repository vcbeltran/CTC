/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



    function funcion_reservar(url) {
                    swal({
                      title: "¿Seguro que desea confirmar la reserva?",
                      text: "Si acepta se le mandará un mail",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                            //window.location.href=url;

                            swal("Procediendo a formalizar reserva....", {
                                            icon: "success",
                            });
                            setTimeout(function(){ window.location.href=url; }, 1500);

                      } else {
                            swal("Canceló la operación");
                      }
                    });

            }
