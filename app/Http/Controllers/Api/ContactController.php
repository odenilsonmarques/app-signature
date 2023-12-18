<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendContact(ContactRequest $request)
    {
        //chamando nossa classe de email que por sua envia os dados para a view contactSite
        Mail::send(new ContactSite($request->all()));

        return response()->json(['message' => 'success']);
    }
}
