<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Titulo Vacante" />

        @error('titulo')
        <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>
    <div class="mt-4">
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select id="salario" wire:model="salario"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option>-- Seleccione --</option>
            @foreach ($salarios as $salario)
            <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>
        @error('salario')
        <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>
    <div class="mt-4">
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select id="categoria" wire:model="categoria"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option>-- Seleccione --</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
        @error('categoria')
        <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa: ej. Netflix, Uber, Shopify" />
        @error('empresa')
        <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia"
            :value="old('ultimo_dia')" />
        @error('ultimo_dia')
        <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Descripción del puesto')" />
        <textarea wire:model="descripcion" id="descripcion"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-72"></textarea>
        @error('descripcion')
        <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>
    <div>
        <x-input-label for="imagen_nueva" :value="__('Imagen')" />
        <x-text-input id="imagen_nueva" class="block mt-1 w-full" type="file" wire:model="imagen_nueva"
            accept="image/*" />

        <div class="my-5 w-80">
            <x-input-label :value="__('Imagen Actual')" />
            <img src="{{asset('storage/vacantes/' . $imagen)}}" alt="{{ 'Imagen Vacante ' . $titulo}}">
        </div>
        <div class="my-5 w-80">
            <!--Este div lo usamos para mostrar una vista previa de la imagen-->
            @if ($imagen_nueva)
            Imagen:
            <img src="{{ $imagen_nueva->temporaryUrl() }}">
            @endif
        </div>

        @error('imagen_nueva')
        <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>

    <x-primary-button class="justify-center">
        {{ __('Editar Vacante') }}
    </x-primary-button>
</form>