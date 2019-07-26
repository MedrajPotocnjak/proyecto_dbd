<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificacionLoa extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Notificacion Correo LOA';
    public $correoAlumno;
    public $cooreoProfesor;
    public $asuntoMensaje;
    public $contenidoMensaje;
    public $nombreAlumno;
    public $nombreProfesor;
    public $appAlumno;
    public $appProfesor;
    public $apmAlumno;
    public $apmProfesor;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correoAlumno,$cooreoProfesor,$asuntoMensaje,$contenidoMensaje,$nombreAlumno,$nombreProfesor, $appAlumno,$appProfesor,$apmAlumno,$apmProfesor)
    {
        $this->correoAlumno = $correoAlumno;
        $this->cooreoProfesor = $cooreoProfesor;
        $this->asuntoMensaje = $asuntoMensaje;
        $this->contenidoMensaje = $contenidoMensaje;
        $this->nombreAlumno = $nombreAlumno;
        $this->nombreProfesor = $nombreProfesor;
        $this->appAlumno = $appAlumno;
        $this->appProfesor = $appProfesor;
        $this->apmAlumno = $apmAlumno;
        $this->apmProfesor = $apmProfesor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notificacion-loa');
    }
}
