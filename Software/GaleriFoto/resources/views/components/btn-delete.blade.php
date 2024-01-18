@props(['link', 'extra'])
<button class="btn btn-xs btn-danger btn-delete" data-link="{{ $link }}" data-extra="{{ $extra }}" data-toggle="modal" data-target="#ModalDelete">
    <i class="fas fa-trash"></i>
</button>