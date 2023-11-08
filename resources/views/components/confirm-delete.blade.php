<div
    x-data="{open: false}"
    x-show="open"
    @confirm-delete.window="

        const get_id = event.detail.get_id

        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $wire.confirmDelete(get_id).then(result => {

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )

                    })
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                    Swal.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )

                }
        })
    "
>

</div>