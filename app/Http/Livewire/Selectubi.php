<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modelos\Departamento;
use App\Modelos\Provincia;
use App\Modelos\Distrito;


class Selectubi extends Component
{

    public $selectedDepartamento = null, $selectedProvincia = null, $selectedDistrito =null;
    public $provincias =null, $distritos =null;
    

    public function render()
    {
        return view('livewire.selectubi', ['departamentos' => Departamento::all(), 'provincias' => Provincia::all() 
        ]);
    }

    public function updatedSelectedDepartamento($departamento_id)
    {
        $this->provincias = Provincia::where('departamento_id', $departamento_id)->get();
    }
}
