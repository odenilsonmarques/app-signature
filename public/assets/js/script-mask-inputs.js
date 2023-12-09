//este treco de código aplica uma mascara ao campo cnpj
document.addEventListener("DOMContentLoaded", function() {
    var cnpjInput = document.getElementById("cnpj");
    
    cnpjInput.addEventListener("input", function(event) {
        var cnpj = event.target.value.replace(/\D/g, "");
        
        if (cnpj.length > 14) {
            cnpj = cnpj.slice(0, 14);
        }
        
        cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2");
        cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
        cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2");
        cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2");
        
        event.target.value = cnpj;
    });
});


//este trecho de código aplica uma mascara ao campo phone
document.addEventListener("DOMContentLoaded", function() {
    var phoneInput = document.getElementById("phone");
    
    phoneInput.addEventListener("input", function(event) {
        var phone = event.target.value.replace(/\D/g, "");
        
        if (phone.length > 11) {
            phone = phone.slice(0, 11);
        }
        
        if (phone.length === 11) {
            phone = phone.replace(/^(\d{2})(\d{1})(\d{4})(\d{4})$/, "($1) $2 $3-$4");
        } else if (phone.length === 10) {
            phone = phone.replace(/^(\d{2})(\d{4})(\d{4})$/, "($1) $2-$3");
        } else if (phone.length === 9) {
            phone = phone.replace(/^(\d{1})(\d{4})(\d{4})$/, "$1 $2-$3");
        } else if (phone.length === 8) {
            phone = phone.replace(/^(\d{4})(\d{4})$/, "$1-$2");
        }
        
        event.target.value = phone;
    });
});


//este trecho possibilita que no input nome produto seja digitado somente letra
document.addEventListener("DOMContentLoaded", function() {
    var nomeInputs = document.querySelectorAll(".only-letters");

    nomeInputs.forEach(function(input) {
        input.addEventListener("input", function(event) {
            var name = event.target.value;
        
            name = name.replace(/[^a-zA-ZÀ-ÿ ]/g, '');
        
            event.target.value = name;
        });
    });
});




