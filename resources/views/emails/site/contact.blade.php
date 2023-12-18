<x-mail::message>
# Novo Contato

Nome: {{$data['name']}}

E-mail: {{$data['email']}}

Assunto: {{$data['subject']}}

Mensagem: {{$data['message']}}


Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
