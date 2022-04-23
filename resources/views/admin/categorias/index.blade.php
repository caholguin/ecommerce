<x-admin-layout>
    <div class="container">
        @livewire('admin.crear-categoria')
    </div>

    
    @push('script')
        <script>
            Livewire.on('eliminarCategoria',categoriaSlug => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.crear-categoria','delete',categoriaSlug )
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</x-admin-layout>