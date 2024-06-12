<div class="btn-group">
    <a href="{{ url('/admin/edit-penerbit/'.$data->id) }}" class="btn btn-info btn-sm">Edit</a>
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus"  data-name="{{ $data->name }}" data-role="{{ $data->role }}" data-id="{{ $data->id }}">
        Hapus
        </button>
</div>
