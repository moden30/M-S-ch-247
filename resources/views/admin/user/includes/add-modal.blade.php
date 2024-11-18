<!-- Form thêm người dùng mới -->
<div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
            </div>
            <form action="{{ route('users.store') }}" enctype="multipart/form-data"
                  autocomplete="on" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id-field"/>

                    <div class="mb-3" id="modal-id" style="display: none;">
                        <label for="id-field1" class="form-label">ID</label>
                        <input type="text" id="id-field1" class="form-control" placeholder="ID"
                               readonly/>
                    </div>

                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Tên người dùng</label>
                        <input type="text" name="ten_doc_gia" id="customername-field"
                               class="form-control @error('ten_doc_gia') is-invalid @enderror"
                               placeholder="Nhập tên người dùng" value="{{ old('ten_doc_gia') }}"
                               required/>
                        @error('ten_doc_gia')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="avarta-field" class="form-label">Ảnh đại diện</label>
                        <input type="file" name="avatar" id="avarta-field"
                               class="form-control @error('avatar') is-invalid @enderror"/>
                        @error('avatar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 xin ">
                        <label for="email-field" class="form-label">Email</label>
                        <input type="email" name="email" id="email-field"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Nhập email" value="{{ old('email') }}" required/>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gender-field" class="form-label">Giới tính</label>
                        <select class="form-control @error('gioi_tinh') is-invalid @enderror"
                                name="gioi_tinh" id="gender-field" required>
                            <option value="Nam" @if (old('gioi_tinh') == 'Nam') selected @endif>
                                Nam
                            </option>
                            <option value="Nữ" @if (old('gioi_tinh') == 'Nữ') selected @endif>Nữ
                            </option>
                        </select>
                        @error('gioi_tinh')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Điện thoại</label>
                        <input type="text" id="phone-field"
                               class="form-control @error('so_dien_thoai') is-invalid @enderror"
                               placeholder="Nhập số điện thoại" name="so_dien_thoai"
                               value="{{ old('so_dien_thoai') }}"/>
                        @error('so_dien_thoai')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address-field" class="form-label">Địa chỉ</label>
                        <input type="text" id="address-field"
                               class="form-control @error('dia_chi') is-invalid @enderror"
                               placeholder="Nhập địa chỉ" name="dia_chi"
                               value="{{ old('dia_chi') }}"/>
                        @error('dia_chi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-field" class="form-label">Mật khẩu</label>
                        <input type="password" id="password-field"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Nhập mật khẩu." name="password"
                               value="{{ old('password') }}" required/>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="status-field" class="form-label">Vai trò</label>
                        <select class="form-control @error('vai_tro') is-invalid @enderror"
                                name="vai_tro" id="status-field" required>
                            @foreach ($vai_tros as $vai_tro)
                                @if($vai_tro->id !== \App\Models\VaiTro::ADMIN_ROLE_ID)
                                    <option value="{{ $vai_tro->id }}"
                                            @if (old('vai_tro') == $vai_tro->id) selected @endif>
                                        {{ $vai_tro->ten_vai_tro }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('vai_tro')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng
                        </button>
                        <button type="submit" class="btn btn-success" id="add-btn">
                            Thêm mới
                        </button>
                        {{--                                            <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End form thm người dùng mới -->
