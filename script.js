const validarInfo = () => {
    let form  = document.getElementById('form');
    
        const nombres = document.getElementById('nombres').value;
        const apellidos = document.getElementById('apellidos').value;
        const identificacion = document.getElementById('identificacion').value;
        const direccion = document.getElementById('direccion').value;
        const telefono = document.getElementById('telefono').value;
        const email = document.getElementById('email').value;
    
        let regexNombres = /^[a-zA-Z\s]+$/;
        let regexApellidos = /^[a-zA-Z\s]+$/;
        let regexIdentificacion = /^\d{8,9}$/;
        let regexDireccion = /^[a-zA-Z0-9\s,.-]+$/;
        let regexTelefono = /^\d{11,12}$/;
        let regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    
        if (!regexNombres.test(nombres)) {
            alert("El nombre es inválido.");
            return false;
        }
        if (!regexApellidos.test(apellidos)) {
            alert("El apellido es inválido.");
            return false;
        }
        if (!regexIdentificacion.test(identificacion)) {
            alert("la identificacion es invalida.");
            return false;
        }
        if (!regexDireccion.test(direccion)) {
            alert("ingrese una direccion.");
            return false;
        }
        if (!regexTelefono.test(telefono)) { 
            alert("ingrese un numero valido.");
            return false;
        } 
        if (!regexEmail.test(email)) {
            alert("El email es inválido.");
            return false;
        }
        let arrInputsCheckBox = document.querySelectorAll('#chck'); 
        let arrValoresCheckBox = []; 
        arrInputsCheckBox.forEach (checkBox => { 
             
            if (checkBox.checked) { 
                arrValoresCheckBox.push(checkBox.value) 
            } 
        }
        );  
    
        if (arrValoresCheckBox.length === 0) {
            alert('por favor seleccione al menos un servicio');
            return false;
        } 
        
    return true;
    };
