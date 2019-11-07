/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


    function funcion_anular(url) {
                    swal({
                      title: "¿Seguro que desea anular la reserva?",
                      text: "Si acepta se cancelará su reserva",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                            //window.location.href=url;

                            swal("Procediendo a anular la reserva....", {
                                            icon: "success",
                            });
                            setTimeout(function(){ window.location.href=url; }, 1500);

                      } else {
                            swal("Canceló la operación");
                      }
                    });

            }