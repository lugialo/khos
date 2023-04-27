function mascara_cpf() {
    var cpf = document.getElementById('cpf_usuario');
    if (cpf.value.length == 3 || cpf.value.length == 7) {
            cpf.value += "."
    }
    else if (cpf.value.length == 11){
        cpf.value += "-" 
    }
}
