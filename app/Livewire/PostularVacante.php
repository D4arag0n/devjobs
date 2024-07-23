<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    public $cv;
    public $vacante;

    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        //dd($this->cv);
        //Almacenar la imagen
        $cv = $this->cv->store('public/cv');
        $nombre_cv = str_replace('public/cv/', '', $cv);

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $nombre_cv
        ]);

        //Crear notificacion y enviar el email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        //Mostrar al usuario un mensaje de ok
        session()->flash('mensaje', 'Se envió correctamente tu información, mucha suerte');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
