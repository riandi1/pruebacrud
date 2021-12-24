<div>
    <button wire:click="$set('open',true)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Agregar un carro
    </button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar un carro
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre del carro" />
                <x-jet-input wire:model="name" type="text" class="w-full" />
                <x-jet-input-error for="name" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Modelo del carro" />
                <x-jet-input wire:model="model" type="text" class="w-full" />
                <x-jet-input-error for="model" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Marca del carro" />
                <x-jet-input wire:model="brand" type="text" class="w-full" />
                <x-jet-input-error for="brand" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Departamento" />
                <select wire:model="department"  class="py-2 border-gray-300 focus:border-indigo-300 w-full focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="">
                    <option value="">Seleccione el departamento</option>
                    @foreach ($departmentArray as $dpt)
                    <option value="{{$dpt->name}}">{{$dpt->name}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="department" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25" wire:target="save">Agregar</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
