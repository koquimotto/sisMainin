<?php

namespace App\Http\Livewire\Almacenes;

use App\Models\Almacen;
use App\Models\Ciudades;
use App\Models\Paises;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Almacenes extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $almacen, $pais_id, $ciudad_id, $direccion, $telefono, $estado, $file;
    public $almacen_seleccionado;

    public $paises, $ciudades;

    public $search = '';

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];
    protected $rules = [
        'almacen' => 'required | string | min:1',
        'pais_id' => 'required | string | min:1',
        'ciudad_id' => 'required | string | min:1',
        'direccion' => 'required | string | min:1',
        'telefono' => 'required | string | min:1',
        'estado' => 'required | string | min:1',
        'file' => 'required | image ',
    ];

    public function mount()
    {
        $this->paises = Paises::all();
        $this->ciudades = Ciudades::all();
        $this->almacen_seleccionado = null;
    }

    public function render()
    {
        $almacenes = Almacen::where('almacen', 'like', "%$this->search%")
            ->orWhere('direccion', 'like', "%$this->search%")
            ->orWhere('telefono', 'like', "%$this->search%")
            ->paginate(15);
        return view('livewire.almacenes.almacenes', compact('almacenes'));
    }

    public function addAlmacen()
    {
        $this->almacen_seleccionado = null;
        $this->reset(['almacen']);
        $this->emit('show-form');
    }

    public function updateAlmacen(Almacen $almacen)
    {
        $this->almacen_seleccionado = $almacen;


        $this->almacen = $almacen->almacen;
        $this->pais_id = $almacen->pais_id . '';
        $this->ciudad_id = $almacen->ciudad_id . '';
        $this->direccion = $almacen->direccion;
        $this->telefono = $almacen->telefono;
        $this->estado = $almacen->estado . '';
        $this->file = null;

        $this->emit('show-form');
    }

    public function deleteAlmacen(Almacen $almacen)
    {
        $this->almacen_seleccionado = $almacen;
        $this->emit('delete-message', 'Se eliminara el almacen ' . $almacen->almacen);
    }

    public function create()
    {
        $this->validate();

        $file_path = $this->file->getClientOriginalName();
        $this->file->storeAs('public/almacenes', $file_path);
        // Crearlink simbolico ..!!

        Almacen::create([
            'almacen' => $this->almacen,
            'pais_id' => $this->pais_id,
            'ciudad_id' => $this->ciudad_id,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'estado' => $this->estado,
            'photo' => $file_path,
        ]);

        $this->emit('confirm-message', 'El almacen se creó correctamente');
        self::clearData(true);
    }
    public function update()
    {
        $this->validate([
            'almacen' => 'required | string | min:1',
            'pais_id' => 'required | string | min:1',
            'ciudad_id' => 'required | string | min:1',
            'direccion' => 'required | string | min:1',
            'telefono' => 'required | string | min:1',
            'estado' => 'required | string | min:1',
            //'file' => 'image ',
        ]);

        $file_path = null;
        if ($this->file) {
            $file_path = $this->file->getClientOriginalName();
            $this->file->storeAs('public/almacenes', $file_path);
        }

        $this->almacen_seleccionado->update([
            'almacen' => $this->almacen,
            'pais_id' => $this->pais_id,
            'ciudad_id' => $this->ciudad_id,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'estado' => $this->estado,
            'photo' => $file_path ? $file_path : $this->almacen_seleccionado->photo
        ]);

        $this->emit('confirm-message', 'El almacen se actualizó correctamente');
        self::clearData(true);
    }

    public function delete()
    {
        $this->almacen_seleccionado->delete();
        $this->emit('confirm-message', 'El almacen se eliminó correctamente');
        self::clearData();
    }

    private function clearData($closeForm = false)
    {
        if ($closeForm)
            $this->emit('close-form');

        $this->reset([
            'almacen',
            'pais_id',
            'ciudad_id',
            'direccion',
            'telefono',
            'estado',
            'file',
            'almacen_seleccionado',
            'search'
        ]);
        $this->emit('render');
    }
}
