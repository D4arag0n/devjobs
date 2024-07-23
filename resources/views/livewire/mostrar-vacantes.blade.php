<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
        <div
            class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="leading-10">
                <a href="{{route('vacante.show', $vacante->id)}}" class="text-xl font-bold">
                    {{ $vacante->titulo}}
                </a>

                <p class="text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
                <p class="text-sm text-gray-500">Último día: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                <a href="{{route('candidato.index', $vacante)}}"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    {{$vacante->candidatos->count()}} Candidatos
                </a>
                <a href="{{route('vacante.edit', $vacante)}}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Editar
                </a>
                <button wire:click="$dispatch('mostrarAlerta', {{$vacante->id}})"
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Eliminar
                </button>

            </div>
        </div>
        @empty
        <p class="p-3 text-sm text-center text-gray-600">No hay Vacantes</p>
        @endforelse
    </div>
    <div class="m-10">
        {{$vacantes->links()}}
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('mostrarAlerta', vacanteId => {
        Swal.fire({
        title: "Eliminar la vacante?",
        text: "¿Una vacante eliminada no se puede recuperar!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, ¡Eliminar!",
        cancelButtonText: "Cancelar"
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('eliminarVacante', [vacanteId])
            Swal.fire({
            title: "Eliminado!",
            text: "La vacante ha sido eliminada.",
            icon: "success"
            });
        }
    });
    })
    /**/
</script>
@endpush