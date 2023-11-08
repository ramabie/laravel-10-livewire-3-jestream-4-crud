<div
    x-data="{open: false}"
    x-show="open"
    @sweet-alert.window="
        Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        }).fire({
            icon: event.detail.icon,
            title: event.detail.title,
        })
    "    
>
</div>