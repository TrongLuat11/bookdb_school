@extends('layouts.account_layout')

@section('title', 'Quản lý Thể loại')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h4 style="font-weight: bold; color: #333;">DANH SÁCH THỂ LOẠI</h4>
        <a href="{{ route('quan-ly-the-loai.create') }}" class="btn-add">
            <i class="fas fa-plus"></i> Thêm thể loại mới
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-custom mt-3">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Tên thể loại</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($theloais as $theloai)
                    <tr>
                        <td>{{ $theloai->id }}</td>
                        <td>{{ $theloai->ten_the_loai }}</td>
                        <td class="text-center">
                            <a href="{{ route('quan-ly-the-loai.edit', $theloai->id) }}" class="btn btn-sm btn-info mr-2">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <form action="{{ route('quan-ly-the-loai.destroy', $theloai->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                    <i class="fas fa-trash"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted py-4">
                            Chưa có thể loại nào. Hãy thêm mới!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
