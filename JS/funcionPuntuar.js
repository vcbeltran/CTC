/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	function rellena_estrella(valoracion){

		valoracion_anterior = document.getElementById('valoracion').value;

		document.getElementById('valoracion').value=valoracion;

		for (i=1; i <= 5; i++){
			if (i <= valoracion){
				//para desmarcar primera
				if (valoracion==1 && i==1 && valoracion_anterior == 1){ 
					document.getElementById('valoracion').value = 0;
					document.getElementById('estrella_' + i).src='../administrador/imagenes/estrella_vacia.png';
                                        document.getElementById('envio').style.visibility = "hidden";
                                        document.getElementById('mensaje').style.visibility = "visible";
					document.getElementById('mensaje').innerHTML = "¡Incluya mínimo un valor!";
				} else { //fin para desmarcar primera
					document.getElementById('estrella_' + i).src='../administrador/imagenes/estrella_llena.png';
                                        document.getElementById('envio').style.visibility = "visible";
					document.getElementById('mensaje').style.visibility = "hidden";
				}
			} else {
				document.getElementById('estrella_' + i).src='../administrador/imagenes/estrella_vacia.png';
			}
		}
		
		document.getElementById('valoracion_mostrar').value=document.getElementById('valoracion').value;
		
		document.getElementById('valoracion_media').src='valoracion_'+ document.getElementById('valoracion').value + '.png';		

	}      


