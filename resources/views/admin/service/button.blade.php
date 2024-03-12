

<button type="button" class="btn btn-primary btn-sm edit-button" value="{{$item['id']}}" data-id="{{$item['id']}}"  onclick="editForm('{{ route('service.edit', $item['id']) }}','edit_modal_body')"
    data-bs-target="#editjob-modal" data-bs-toggle="modal">
    <i class="fas fa-edit"></i>
</button>
