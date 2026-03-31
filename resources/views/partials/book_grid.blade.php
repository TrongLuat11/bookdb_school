<div class='list-book' id="book-grid">
    @foreach($data as $row)
        <div class='book' data-sach-id="{{ $row->id }}">
            <a href="{{url('sach/chitiet/'.$row->id)}}" class="book-link">
                <img src="{{ asset('hinh/image/'.$row->file_anh_bia) }}" width='200px' height='200px'>
                <br>
                <b>{{ $row->tieu_de }}</b>
                <br>
                <i>{{ number_format($row->gia_ban, 0, ",", ".") }}đ</i>
            </a>

            <div class="book-actions">
                <span style="font-size:12px; color:#666;">Số lượng:</span>
                <input type="number" min="1" value="1" class="book-qty" />

                <button type="button" class="btn btn-sm btn-danger btn-add-to-cart" data-sach-id="{{ $row->id }}">
                    Thêm vào giỏ hàng
                </button>

                <a class="btn btn-sm btn-link p-0 book-detail-link" href="{{url('sach/chitiet/'.$row->id)}}">
                    Xem chi tiết
                </a>
            </div>
        </div>
    @endforeach
</div>

<style>
    /* Chỉ ảnh hưởng vùng sách list */
    #book-grid .book-actions{
        display:flex;
        flex-direction:column;
        align-items:center;
        gap:6px;
        margin-top:8px;
    }
    #book-grid .book-qty{
        width:90px;
        text-align:center;
        padding:4px 6px;
        border:1px solid #ddd;
        border-radius:6px;
    }
    #book-grid a{
        color:inherit;
        text-decoration:none;
    }
    #book-grid .btn-add-to-cart{
        padding:6px 10px;
        border-radius:8px;
    }

    /* Chỉ hiện phần mua khi user đã bấm vào cuốn sách */
    #book-grid .book:not(.open) .book-actions{
        display:none;
    }

    #book-grid .book.open .book-actions{
        display:flex;
    }
</style>

