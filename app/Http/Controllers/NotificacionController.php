<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Esta funcion se creo cuando al crear el controller 
     * php artisan make:controller NotificacionController --invokable
     * de esta forma en la llamada desde el endpoint no es necesario colocar un metodo ya que es el unico que se manda llamar
     */
    public function __invoke(Request $request)
    {
        //Obtenemos la lista de notificaciones
        $notificaciones = auth()->user()->unreadNotifications;

        //Marcar las notificaciones como vistas
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones
        ]);
    }
}
