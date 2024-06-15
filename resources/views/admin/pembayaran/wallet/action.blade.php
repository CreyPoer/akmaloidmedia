<div class="btn-group">
    <a href="{{ url('/admin/edit-wallet/'.$data->id) }}" class="btn btn-info btn-sm" title="Edit Slide Show">Edit</a>
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus"  data-wallet="{{ $data->e_wallet }}" data-id="{{ $data->id }}">
        Hapus
        </button>
</div>
