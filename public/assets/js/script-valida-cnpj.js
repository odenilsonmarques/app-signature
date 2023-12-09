document.getElementById('cnpj').addEventListener('input', function () {
    const cnpj = this.value;
    const isValid = validarCNPJ(cnpj);
    const errorSpan = document.getElementById('cnpj-error');
    const certo = document.getElementById('cnpj-certo');

    if (isValid) {
        certo.textContent = 'ok';
    } 

    if (! isValid) {
        errorSpan.textContent = 'CNPJ inválido';
       
    } 
});


function validarCNPJ(cnpj) {
    // Remove caracteres não numéricos
    cnpj = cnpj.replace(/[^\d]+/g, '');

    // Verifica se o CNPJ possui 14 dígitos
    if (cnpj.length !== 14) {
        return false;
    }

    // Verifica se todos os dígitos são iguais
    if (/^(\d)\1+$/.test(cnpj)) {
        return false;
    }

    // Calcula o primeiro dígito verificador
    let soma = 0;
    for (let i = 0; i < 12; i++) {
        soma += parseInt(cnpj.charAt(i)) * (13 - i);
    }
    let resto = (soma % 11);
    let digitoVerificador1 = (resto < 2) ? 0 : 11 - resto;

    // Calcula o segundo dígito verificador
    soma = 0;
    for (let i = 0; i < 13; i++) {
        soma += parseInt(cnpj.charAt(i)) * (14 - i);
    }
    resto = (soma % 11);
    let digitoVerificador2 = (resto < 2) ? 0 : 11 - resto;

    // Verifica se os dígitos verificadores são válidos
    if (parseInt(cnpj.charAt(12)) !== digitoVerificador1 || parseInt(cnpj.charAt(13)) !== digitoVerificador2) {
        return false;
    }

    return true;
}
