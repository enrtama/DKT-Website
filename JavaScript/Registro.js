
function validar_formulario(register){
	
    if (dni_valido(register.dni.value) == false){
	    alert("Por favor, rellene el campo DNI correctamente.");
	    register.dni.focus();
	    return false;
    } //id dni_valido
	
    if (nombre_apellidos_valido(register.userName.value) == false){
	    alert ("Por favor, rellene el campo Nombre correctamente.");
	    register.userName.focus();
	    return false;
    } //if nombre_valido

    if (nombre_apellidos_valido(register.userName.value) == false){
	    alert ("Por favor, rellene el campo Apellidos correctamente.");
	    register.userSurname.focus();
	    return false;
    } //if apellidos_valido
	
	if (register.nivelContrasena.value == "Fortaleza insuficiente"){
		alert("Por favor, introduzca una contrasena robusta.");
		register.contrasena.focus();
		return false;
	} //if password insuficiente
	
    if (confirmar_contrasena(register.password.value, register.repassword.value) == false){
	    alert("La contrasenas introducidas no coinciden.");
	    register.password.focus();
	    return false;
    } //if confirmar_contrasena

	if (telefono_valido(register.phone.value) == false){
	    alert("Por favor, rellene el  Telefono correctamente.");
	    register.phone.focus();
	    return false;
    } //if telefono valido     

    if (correo_valido(register.mail.value) == false){
	    alert("Por favor, rellene el Email correctamente.");
	    register.mail.focus();
	    return false;
    } //if correo valido
	
	if (fichero_valido(register.userfile.value) == false){
	    alert("Por favor, rellene la imagen correctamente.");
	    register.userfile.focus();
	    return false;
    } //if correo valido

    if (window.confirm("Send register ?"))
	   return true;
    else
	   return false;

} //validarFormulario

/* Borrar formulario */
function resetear(){
	return window.confirm("Delete data ?");
}

/* Comprueba que la contrasena sea introducida correctamente */
function confirmar_contrasena(pass1, pass2){
	if (pass1 != pass2){
		return false;
	}else {
		return true;
	} //if 
} //if contrasenas iguales

/* Valida el Nombre y Apellidos */
function nombre_apellidos_valido(cadena){
	if (cadena.length==0){
		return false;
	} else if (tiene_numero(cadena)==true){
		return false;	
	} else {
		return true;	
	}
} //nombre_apellidos_valido


/* Valida la direccion */
function direccion_valida(cadena){
	if (cadena.length < 3)
		return false;
	if (tiene_numero(cadena) == false)
		return false;
	if (tiene_letras(cadena) == false)
		return false;
	return true;
} //if direccion valida

/* Valida la Ciudad */
function ciudad_valida(cadena){
	if (cadena.length == 0)
		return false;
	if (tiene_numero(cadena) == true)
		return false;
	return true;
} //if ciudad valida

function password_valido(cadena){
	var expre = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/;
	if ((cadena.match(expre)) && (cadena.length != 0)){		
		return true;
	} else {
		return false;
	} //if
} //if password_valido
		

/* Valida cp */
function cp_valido(cadena){
	var expre = /^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$/;
	if ((cadena.match(expre)) && (cadena.length != 0))
		return true;
	else
		return false;
} //if cp_valido


/* Valida una cadena de texto */
function cadena_valida(cadena){
    if (cadena.value.length == 0)
	    return false;
    if (tiene_numero(cadena) == true)
	    return false;
    return true;
}

/* Comprueba si una cadena tiene caracteres numericos */
function tiene_numero(cadena){
	var numeros = "0123456789";
	for (i = 0; i < cadena.length; i++){
		if (numeros.indexOf(cadena.charAt(i), 0) != -1)
			return true;
	}
	return false;
}

/* Comprueba si una cadena tiene letras */
function tiene_letras(cadena){
	var letras = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXY";
	for (i = 0; i < cadena.length; i++){
		if (letras.indexOf(cadena.charAt(i), 0) != -1){
			return true;
		} //if
	} //for
	return false;
} //tiene_letras

function solo_letras(cadena){
	var letras = /^([a-zA-Z\/\-\s\&ntilde;\&aacute;\&eacute;\í\&oacute;\&uacute;])*$/;
	if (!letras.test(cadena)){
		return false;
	}else{
		return true;
	} //if
}  //solo_letras

/* Algoritmo digitos de control */
function digito_control(cadena){
	var peso = new Array(1,2,4,8,5,10,9,7,3,6);
  	var check = 0;
  
  	for (var i = 0; i < cadena.length; i++){
      		check += parseInt(cadena.charAt(i)) * peso[i];
	} //for
  	check = 11 - (check % 11);
	if (check == 11)
		check = 0;
	if (check == 10)
		check = 1;
	return check;
} //digitoControl


function telefono_valido(telefono){
	var expre = /^[0-9]{2,3}-? ?[0-9]{6,7}$/;
	if ((telefono.match(expre)) && (telefono.length != 0))
		return true;
	else
		return false;
} //if telefono valido

/* Verifica si 'valor' es un entero */
function entero_valido(valor){
    
    var cadena = valor.value.toString();
    var longitud = cadena.length;
    
    if (longitud == 0)
        return false;
    
    var ascii = null;
    for (var i = 0; i < longitud; i++) {
        ascii = cadena.charCodeAt(i);
        if (ascii < 48 || ascii > 57)
            return false;
    }
    return true;
}

function dni_valido(dni){
	var letras= new Array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
	var correcto = true;
	
	if (dni.length!=9){
		correcto = false;
	} //if
	
	var letra = dni.charAt(dni.length-1); 
	var numeroDNI = dni.substring(0,dni.length-1);		
	if (tiene_letras(numeroDNI)==true){
		correcto = false;
	} //if

	var modulo = numeroDNI % 23; 			
	if (letras[modulo]!=letra.toUpperCase()){
		correcto = false;	
	} //if

	return correcto;		
} //dni_valido

function actualizar_nivel_contrasena(c, nivelContrasena){
	if (c.length<=4){
		nivelContrasena.value = "Fortaleza insuficiente"; 
		nivelContrasena.style.color="red";
	} else if (c.length<=7){
		nivelContrasena.value = "Fortaleza suficiente"; 
		nivelContrasena.style.color="#FC0";
	} else{
		nivelContrasena.value = "Fortaleza optima"; 
		nivelContrasena.style.color="green";
	} //if
} //actualizar_nivel_contrasena

function contrasena_valida(c){
	if (c.length<=4){
		return false;
	} //if
	return true;
} //contrasena_valida

function direccion_valida(d){
	if (d.length==0){
		return false;		
	} else if (tiene_numero(d)==false){
		return false;			
	} else if (tiene_letras(d)==false){
		return false;
	} else {
		return true;
	} //if
	
} //direccion_valida

function codigo_postal_valido(c){
	if (c.length!=5){
		return false;
	} else if (tiene_letras(c)==true){
		return false;	
	} else {
		return true;	
	} //if
} //codigo_postal_valido

function localidad_provincia_valida(l){
	if (l.length==0){
		return false;
	} else if (tiene_numero(l)==true){
		return false;	
	} else {
		
		return true;	
	} //if
} //localidad_valida

function telefono_valido(t){
	if (t.length!=9){
		return false;
	} else if (tiene_letras(t)==true){
		return false;	
	} else {
		return true;
	} //if
} //telefono_valido

function correo_valido(c){
    var filtro=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (filtro.test(c)){
		return true;
	} else{
		return false;
	} //if
} //correo_valido

function fichero_valido(f){
	if (f.length==0){
		return false;	
	} else {
		return true;
	} //if
} //fichero_valido
