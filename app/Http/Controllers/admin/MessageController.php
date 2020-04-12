<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\NewMessage;

class MessageController extends Controller
{
    public function newMessage(){
    $message['user'] = "Juan Perez";
    $message['message'] =  "Prueba mensaje desde Pusher";
    $success = event(new NewMessage($message));
    echo "succes send";
    return $success;
    }

    public function viewMessage(){

        return view('admin.message');
    }
}
