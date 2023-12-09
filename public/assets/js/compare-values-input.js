document.addEventListener("DOMContentLoaded", function() {
    var amountInput = document.getElementById("amount");
    var confirmAmountInput = document.getElementById("confirm_amount");
    var minimumAmountInput = document.getElementById("minimum_amount");

    var submitButton = document.getElementById("submitBtn");

    submitButton.addEventListener("click", validateAmount);

    function validateAmount(event) {
        var amountValue = amountInput.value;
        var confirmAmountValue = confirmAmountInput.value;
        var minimumAmountValue = minimumAmountInput.value;

        if (amountValue !== confirmAmountValue) {
            event.preventDefault(); 
            // alert("Os valores devem ser iguais!");
            swal({
                title: "Ops...",
                text: "Os campos Quantidade e Confirme a Quantidade precisam ter o mesmo valor !", 
            });
        }
        else if( minimumAmountValue > amountValue) {
            event.preventDefault(); 
            // alert("A quantidade minima não pode ser maior do que a quantidade geral!");
            swal({
                title: "Ops...",
                text: "A quantidade minima não pode ser maior do que a qauntidade geral !", 
            });
        }
    }
});