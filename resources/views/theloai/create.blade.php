@extends('layouts.account_layout')

@section('title', 'Thêm Thể loại Mới')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 style="font-weight: bold; color: #333;">THÊM THỂ LOẠI MỚI</h4>
        <a href="{{ route('quan-ly-the-loai.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    <div class="card-custom" style="max-width: 600px;">
        <form action="{{ route('quan-ly-the-loai.store') }}" method="POST">
            @csrf
            
            <div class="form-group mb-4">
                <label for="ten_the_loai" style="font-weight: 600;">Tên Thể loại</label>
                <input type="text" name="ten_the_loai" id="ten_the_loai" class="form-control @error('ten_the_loai') is-invalid @enderror" placeholder="Nhập tên thể loại (VD: Khoa học, Viễn tưởng...)" value="{{ old('ten_the_loai') }}" required>
                @error('ten_the_loai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary px-5">
                    <i class="fas fa-save mr-2"></i> Lưu thể loại
                </button>
            </div>
        </form>
    </div>
@endsection
