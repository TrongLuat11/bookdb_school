<x-booklayout>
    <x-slot name="title">
        Sách
    </x-slot>

    <div class='list-book'>
        @foreach($data as $row)
            <a href="{{url('sach/chitiet/'.$row->id)}}">
                <div class='book'>
                    <img src="{{ asset('hinh/image/'.$row->file_anh_bia) }}" width='200px' height='200px'>
                    <br>
                    <b>{{ $row->tieu_de }}</b>
                    <br>
                    <i>{{ number_format($row->gia_ban, 0, ",", ".") }}đ</i>
                </div>
            </a>
        @endforeach
    </div>
</x-booklayout>

