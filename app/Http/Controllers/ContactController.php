<?php

namespace App\Http\Controllers;

use App\Mail\ContactMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact.index');
    }

    public function send(Request $request){
        $request->validate([
            'nombre'=>['required', 'string', 'min:3'],
            'email'=>['required', 'email'],
            'mensaje'=>['required', 'string', 'min:5', 'max:250'],
        ]);
        
        Mail::to('adminsitio@gmail.com')->send(new ContactMailable($request->all()));
        return redirect()->route('dashboard')->with('info', 'mensaje enviado');
    }
}
