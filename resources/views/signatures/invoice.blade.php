{{-- aqui usamos a configuração padrao do dashboard do laravel, mas poderia ser outra, como bootstrap --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Minhas faturas') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6">
        {{-- condição para cancelar assinatura --}}
        @if ($subscription)

            {{-- se o cliente clicar em cancelar e ainda estiver o periodo virgente, ele vai ter acesso até a data de expiração --}}
            @if($subscription->canceled() && $subscription->onGracePeriod())
                <a href="{{ route('signatures.resume') }}" class="btn btn-outline-success">Reativar Assinatura</a>
                seu acesso vai até: {{$user->access_end}}
                
                {{-- caso nao tenha cancelado --}}
            @elseif(!$subscription->canceled())
                <a href="{{ route('signatures.cancel') }}" class="btn btn-outline-danger">Cancelar Assinatura</a>
            @endif

            {{-- se assinatura foi cancelada  e o periodo de virgente acabou, é encerrado todo acesso --}}
            @if($subscription->ended())
                Assinatura cancaleda
            @endif

        @else
            <button type="button" class="btn btn-outline-secondary">Você não é assinante</button>
        @endif
    </div>

    <div class="container mx-auto mt-6">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Baixar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($invoice->date())) }}</td>
                        <td>{{ $invoice->total() }}</td>
                        <td>
                            <a href="{{ route('signatures.invoice.download', $invoice->id) }}"
                                class="text-blue-500 hover:underline">
                                Download
                            </a>
                        </td>
                    </tr>
                @endforeach
                <!-- Adicione mais linhas conforme necessário -->
            </tbody>
        </table>
    </div>
</x-app-layout>
