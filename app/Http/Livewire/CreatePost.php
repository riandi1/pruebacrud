<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Car;
use Illuminate\Support\Facades\Http;
use App\Models\departament;

class CreatePost extends Component
{
    public $open = false;
    public $name,$model,$brand,$department="";

    protected $rules = [
        'name' => 'required|min:5',
        'model' => 'required|min:5',
        'brand' => 'required|min:5',
        'department' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        // DIFERENCIA EL API DEL GOBIERNO ES MUCHO MAS RAPIDA LA APP SI SE MANEJA DES BD E IGUAL SE HIZO EL TEST Y ES 3 segundos mas rapida asi que por peticion http
        // $department = HTTP::get('https://www.datos.gov.co/resource/xdk5-pm3f.json');
        // $departmentArray = $department->json();
        $departmentArray = departament::all();
        return view('livewire.create-post',compact('departmentArray'));
    }
    public function save()
    {
        $this->validate();
        Car::create([
            'name' => $this->name,
            'model' => $this->model,
            'brand' => $this->brand,
            'department' => $this->department
        ]);

        $this->reset(['open','name','model','brand','department']);
        $this->emitTo('show-cars','render');
        $this->emit('alert','Carro Insertado');
    }
}
