<div class="btn-group">
    <a href="{{ url('/admin/edit-slideshow/'.$data->id) }}" class="btn btn-info btn-sm" title="Edit Slide Show">Edit</a>
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus"  data-judul="{{ $data->judul }}" data-id="{{ $data->id }}">
        Hapus
        </button>
</div>
