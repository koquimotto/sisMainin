<?php

namespace App\Http\Livewire\Configuracion\Usuarios;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithPagination; 

    public $modeUpdate = false;
    //public $data = [];

    public $nombres="", $apellidos="", $dni="", $tipo='', $email= '', $password = '';
    public $usuario_actual = null;  

    public $search = '';

    protected $listeners = [
        'delete'
    ];
    protected $paginationTheme = 'bootstrap'  ;

    public function addUser(){
        $this->modeUpdate = false;
        $this->reset([ 'nombres', 'apellidos', 'tipo', 'dni', 'email', 'password', 'usuario_actual', 'usuario_actual', 'modeUpdate']);
        $this->emit('show-form'); //dispara el evento en el componente padre para que se muestre el modal de crear usuario 
    }

    public function updateUser (User $user) {
        $this->usuario_actual = $user;
        $this->modeUpdate = true;

        $this->nombres  =  $user->nombres ;    
        $this->apellidos  =  $user->apellidos ;   
        $this->dni  =  $user->dni ;   
        $this->tipo  =  $user->type ;   
        $this->email  =  $user->email ;    
        $this->password  =  '';

        $this->emit('show-form');
    }

    public function deleteUser (User $user){
        $this->usuario_actual = $user;
        $this->emit('delete-message', 'Se eliminara el usuario '.$user->nombres); 
    }

    public function render()
    {
        return view('livewire.configuracion.usuarios.usuarios',['usuarios' =>  User::where('nombres', 'like', "%$this->search%")
                                                                                    ->orWhere('nombres', 'like', "%$this->search%")
                                                                                    ->orWhere('apellidos', 'like', "%$this->search%")
                                                                                    ->orWhere('dni', 'like', "%$this->search%")
                                                                                    ->orWhere('email', 'like', "%$this->search%")
                                                                                    ->paginate(10)]);
    }

    public function updatingSearch(){
        $this-> resetPage('una-pagina');
    }

    public function create(){
        $this->validate([
            "nombres" => 'required | string | min:3',
            "apellidos" => 'required | string | min:5',
            "tipo" => 'required | string | min:1',
            "dni" => 'required | string | max:9',
            "password" => 'required | string | min:8',
            "email" => 'required | email | unique:users,email',
        ]);

        User::create([
            'nombres' => $this->nombres ,
            'apellidos' => $this->apellidos  ,
            'dni' => $this->dni  ,
            'type' => $this->tipo  ,
            'email' => $this->email  ,
            'password' => Hash::make($this->password)  ,
        ]);
        $this->emit('confirm-message', 'El usuario fue creado correctamente');
        self::clearData(true);
    }

    public function update(){
        Log::debug( $this->usuario_actual);
        $this->validate([
            "nombres" => 'required | string | min:3',
            "apellidos" => 'required | string | min:5',
            "tipo" => 'required | string | min:1',
            "dni" => 'required | string | max:9',
            "password" => 'required | string | min:8',
            "email" => 'required | email | unique:users,email,'.($this->usuario_actual->id),
        ]);

        $this->usuario_actual->update([
            'nombres' => $this->nombres ,
            'apellidos' => $this->apellidos  ,
            'dni' => $this->dni  ,
            'type' => $this->tipo  ,
            'email' => $this->email  ,
            'password' => Hash::make($this->password)
        ]);

        $this->emit('confirm-message', 'El usuario fue actualizado correctamente');
        self::clearData(true);
    }

    public function delete(){
        $this->usuario_actual->delete();
        
        self::clearData();
        $this->emit('confirm-message', 'El usuario fue eliminado correctamente');
    }

    private function clearData( $closeForm = false ){
        if($closeForm)
            $this->emit('close-form'); 

        $this->reset([ 'nombres', 'apellidos', 'tipo', 'dni', 'email', 'password', 'usuario_actual', 'usuario_actual', 'modeUpdate', 'search']);
/*         $this->usuario_actual = null;
        $this->modeUpdate = false; */
        $this->emit('render'); 
    }

}
