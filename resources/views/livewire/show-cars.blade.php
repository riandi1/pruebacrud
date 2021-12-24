<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="px-6 py-4 flex items-center">
                    <input type="text"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block flex-1 mr-4 shadow-sm sm:text-sm border-gray-300 rounded-md"
                        wire:model="search" placeholder="Escriba el nombre del nombre,modelo o marca">
                    @livewire('create-post')
                </div>
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th wire:click="order('id')" scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-down float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th wire:click="order('name')" scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-down float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th wire:click="order('model')" scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Modelo
                                @if ($sort == 'model')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-down float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th wire:click="order('brand')" scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Marca
                                @if ($sort == 'brand')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-down float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Departamento
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Operaciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($cars as $car)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $car->id }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $car->name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $car->model }}
                                </td>
                                <td class="px-6 py-4">

                                    {{ $car->brand }}

                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $car->department }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium flex ">
                                    {{-- @livewire('edit-car', ['car' => $car], key($car->id)) --}}
                                    <div>
                                        <a wire:click="edit({{ $car->id }})"
                                            class="text-white py-2 px-4 rounded cursor-pointer bg-green-500">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <a wire:click="$emit('delete',{{ $car->id }})"
                                            class="text-white py-2 ml-2 px-4 rounded cursor-pointer bg-red-500">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class="px-6 py-4">
                                No hay carros que tengan dichas caracteristicas.
                            </div>
                        @endforelse

                        <!-- More people... -->
                    </tbody>
                </table>
                <div class="px-4 py-4">
                    {{ $cars->links() }}
                </div>
            </div>
        </div>
        <x-jet-dialog-modal wire:model="open">
            <x-slot name="title">
                Editar el carro {{ $car->name }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-jet-label value="Nombre del carro" />
                    <x-jet-input wire:model="car.name" type="text" class="w-full" />
                    <x-jet-input-error for="car.name" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="Modelo del carro" />
                    <x-jet-input wire:model="car.model" type="text" class="w-full" />
                    <x-jet-input-error for="car.model" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="Marca del carro" />
                    <x-jet-input wire:model="car.brand" type="text" class="w-full" />
                    <x-jet-input-error for="car.brand" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('open',false)">Cancelar</x-jet-secondary-button>
                <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25"
                    wire:target="save">Actualizar</x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
    @push('js')
        <script>
            Livewire.on('delete', cardId => {
                Swal.fire({
                    title: '¿Esta seguro que desea eliminar?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si,Deseo eliminarlo'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('show-cars', 'delcar', cardId);
                        Swal.fire(
                            'Eliminado!',
                            '',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>
