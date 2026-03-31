@extends('layouts.account_layout')

@section('title', 'Quản lý sách')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h4 style="font-weight: bold; color: #333;">DANH SÁCH SÁCH</h4>
        <a href="{{ route('sach.create') }}" class="btn-add">
            <i class="fas fa-plus"></i> Thêm sách mới
        </a>
    </div>

    <div class="card-custom">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Giá bán</th>
                    <th>Tác giả</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>
                            @if($book->file_anh_bia)
                                <img src="{{ asset('hinh/image/'.$book->file_anh_bia) }}" width="50" class="img-thumbnail">
                            @else
                                <span class="badge badge-secondary">No image</span>
                            @endif
                        </td>
                        <td style="max-width: 200px; word-wrap: break-word;">{{ $book->tieu_de }}</td>
                        <td>{{ number_format($book->gia_ban, 0, ',', '.') }}đ</td>
                        <td>{{ $book->tac_gia }}</td>
                        <td class="text-center">
                            <a href="{{ route('sach.edit', $book->id) }}" class="btn btn-sm btn-info mr-2">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <form action="{{ route('sach.delete', $book->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                    <i class="fas fa-trash"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
