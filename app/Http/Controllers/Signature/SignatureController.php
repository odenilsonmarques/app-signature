<?php

namespace App\Http\Controllers\Signature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class SignatureController extends Controller
{
    //Definindo nesse construtor que para usar qualquer metodo desse controller deve-se está autenticado. Isso também pode ser definido nas rotas
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    //método para cadastrar usuários logados
    public function store(Request $request)
    {
        $request->user()
            ->newSubscription('default', 'price_1NwmxHKgIIEG85eD7N7B3Gnv') //so foi possivell usar o metodo newSubscription poque configuramos o bilable do cashier no model e este ja tem varios recursos que podemos usar. o primeiro parametro é tipo de plano nesse caso o padrao(default) o segundo é o plano em no caso estamos pegando direto do stripe, mas a ideia é dinamizar
            ->create($request->token); //recendo o token atraves da request
        // depois que for criado a assinatura do usuário ele vai ser direcionado para uma pagina premium
        return redirect()->route('signatures.premium');
    }

    //método para chamar a view premium que vai ser acessivel para usuarios com assinaturas, caso nao for vai para checkout. A lógica de direcionamento foi implementada midllaware
    public function premium()
    {
        return view('signatures.premium');
    }

    //metodo para chamar a view de cheackou.
    public function checkout()
    {
        // Se o usuário for assinante este é redirecionado para o premium, caso nao for vai para pagina checkout
        if (auth()->user()->subscribed('default'))
            return redirect()->route('signatures.premium');

        return view('signatures.checkout', [

            // aqui estamos gerando uma especie de intenção(intent) de pagamento e recuperando o usuario autenticado e chama o metod createSetupIntennt do stripe. Despoi é preciso pegar essa variavel na view, e nesse caso declaramos no botao
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    // metodo para exibir as faturas
    public function invoice()
    {
        $invoices = auth()->user()->invoices();

        return view('signatures.invoice', compact('invoices'));
    }

    // metodo para download
    public function downloadInvoice($invoiceId)
    {
        return Auth::user()
            ->downloadInvoice($invoiceId, [
                'vendor' => config('app.name'),
                'product' => ('assinatura vip')

            ]);
    }

    //metodo para cancelar assinatura
    public function cancel()
    {
        auth()->user()->subscription('default')->cancel();

        return redirect()->route('signatures.invoice');
    }

    //metodo para reativar assinatura
    public function resume()
    {
        auth()->user()->subscription('default')->resume();

        return redirect()->route('signatures.invoice');
    }


}
