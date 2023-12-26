// sendForm.js

document.addEventListener('DOMContentLoaded', function () {
    
    var contactForm = document.getElementById('contactForm')
    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            // Impede o envio padrão do formulário
            event.preventDefault();
            var apiUrl = 'http://localhost:8787/api/contact';
            // Realiza a solicitação AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', apiUrl, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            alert(response.message);

                            document.getElementById("contactForm").reset();
                            
                        } catch (e) {
                            console.error('Erro ao analisar resposta JSON:', e);
                            // Lide com a resposta não JSON aqui
                            alert('Erro inesperado. Por favor, tente novamente.');
                        }
                    } else {
                        console.error('Erro na solicitação AJAX. Código de status:', xhr.status);
                        alert('Erro ao enviar o formulário. Por favor, tente novamente.');
                    }
                }
            };
            // Obtém os dados do formulário
            var formData = new FormData(contactForm);

            console.log('dados',formData)
            // Envia a solicitação
            xhr.send(new URLSearchParams(formData));
        });
    }
});
