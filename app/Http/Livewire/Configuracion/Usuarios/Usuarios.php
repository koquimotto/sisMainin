<?php

namespace App\Http\Livewire\Configuracion\Usuarios;

use Livewire\Component;
use App\Models\User;

class Usuarios extends Component
{
    public $modalTitle = "Crear Nuevo Usuario";
    public $buttonName = "";
    public $showModal = false;
    public $data = [];

    public function addUser(){
        
        $this->modalTitle = "Crear Nuevo Usuario";
        $this->buttonName = "Crear Usuario";
        // $this->data = [];
        $this->showModal = false;
        $this->dispatchBrowserEvent('show-form'); //dispara el evento en el componente padre para que se muestre el modal de crear usuario 
    }

    public function render()
    {
        $usuarios = User::all();
        return view('livewire.configuracion.usuarios.usuarios',['usuarios' => $usuarios]);
    }
}
