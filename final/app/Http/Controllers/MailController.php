<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function enviarEmail($para)
    {
        $details=[
            'title'=>'Creacion de un nuevo Administrador',
            'body'=>'Bienvenido usted es un Administrador del sistema veterinario'
        ];
        Mail::to($para)->send(new TestMail($details));
        return "Correo enviado con exito";        
    }
}
