<!-- Form sửa người dùng -->
@foreach ($users as $user)
    <div class="modal fade" id="showEditModal{{ $user->id }}" tabindex="-1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close" id="close-modal"></button>
                </div>
                <form action="{{ route('users.update', $user->id) }}"
                      id="edit-user-form-{{ $user->id }}" enctype="multipart/form-data"
                      autocomplete="on" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="ten_doc_gia" class="form-label">Tên người dùng</label>
                            <input type="text" name="ten_doc_gia" class="form-control"
                                   value="{{ old('ten_doc_gia', $user->ten_doc_gia) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email', $user->email) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="gioi_tinh" class="form-label">Giới tính</label>
                            <select name="gioi_tinh" class="form-control" disabled>
                                <option value="Nam"
                                        @if (old('gioi_tinh', $user->gioi_tinh) == 'Nam') selected @endif>
                                    Nam
                                </option>
                                <option value="Nữ"
                                        @if (old('gioi_tinh', $user->gioi_tinh) == 'Nữ') selected @endif>
                                    Nữ
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                            <input type="text" name="so_dien_thoai" class="form-control"
                                   value="{{ old('so_dien_thoai', $user->so_dien_thoai) }}"
                                   readonly>
                        </div>
                        <div class="mb-3">
                            <label for="vai_tro" class="form-label">Vai trò</label>
                            <select name="vai_tro" class="form-control">
                                @foreach ($vai_tros as $vai_tro)
                                    <option value="{{ $vai_tro->id }}"
                                            @if ($user->vai_tros->contains('id', $vai_tro->id)) selected @endif>
                                        {{ $vai_tro->ten_vai_tro }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Đóng
                        </button>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
<!-- End form sửa người dùng -->
