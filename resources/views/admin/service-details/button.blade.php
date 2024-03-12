

<button type="button" class="btn btn-primary btn-sm edit-button" value="{{$item['id']}}" data-id="{{$item['id']}}"  onclick="editForm('{{ route('service.details.edit', $item['id']) }}','edit_modal_body')"
    data-bs-target="#editjob-modal" data-bs-toggle="modal">
    <i class="fas fa-edit"></i>
</button>

<button type="button" class="btn btn-danger btn-sm tooltip1" onclick="delete_entity('{{ route('service.details.delete',$item['id']) }}')" data-id="{{$item['id']}}">
    <i class="fas fa-trash-alt"></i>
</button>
