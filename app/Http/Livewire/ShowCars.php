<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Car;
use Livewire\WithPagination;
use App\Models\departament;

class ShowCars extends Component
{
    use WithPagination;
    // connect view with livewire for all writter in heer, is refresh sql
    public $search = '',$open= false;
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render','delcar'];
    protected $rules = [
        'car.name' => 'required|min:5',
        'car.model' => 'required|min:5',
        'car.brand' => 'required|min:5',
    ];
    // for pagination reset pagination
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    // principal view
    public function render()
    {
        $cars = Car::where('name','like', '%'.$this->search.'%')
        ->OrWhere('model','like', '%'.$this->search.'%')
        ->OrWhere('brand','like', '%'.$this->search.'%')
        ->orderBy($this->sort,$this->direction)
        ->paginate(10);
        return view('livewire.show-cars',compact('cars'));
    }
    // filter asc and desc and name, model, brand
    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
            
        }else {
            $this->sort = $sort;
        }
    }
    public function delcar(Car $car)
    {
        $car->delete();
    }

    public function edit(Car $car)
    {
        $this->car = $car;
        $this->open = true;
    }
    public function update()
    {
        $this->validate();
        $this->car->save();
        $this->reset(['open']);
        $this->emit('alert','Carro Actualizado');
    }
}
