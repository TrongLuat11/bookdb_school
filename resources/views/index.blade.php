<x-booklayout>
    <x-slot name="title">
        Sách
    </x-slot>

    <div id="book-content">
        @include('partials.book_grid')
    </div>

    <script>
        $(document).ready(function () {
            // Sử dụng $(document).on() để bắt sự kiện click cho cả các thẻ sách được tải mới qua AJAX
            $(document).on("click", ".btn-add-to-cart", function () {
                var id = $(this).attr("data-sach-id");
                var num = $(this).closest('.book').find('.book-qty').val() || 1;

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('cartadd') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "num": num
                    },
                    beforeSend: function () {
                        // Có thể thêm loading spinner ở đây
                    },
                    success: function (data) {
                        // Cập nhật số lượng giỏ hàng trên badge
                        $("#cart-number-product").html(data);
                        
                        // Hiển thị thông báo nhỏ
                        var btn = $(this);
                        var originalText = btn.text();
                        btn.text("Đã thêm!");
                        btn.removeClass("btn-danger").addClass("btn-success");
                        setTimeout(function(){
                            btn.text(originalText);
                            btn.removeClass("btn-success").addClass("btn-danger");
                        }, 1500);
                        
                    }.bind(this), // bind this để sử dụng $(this) trong callback
                    error: function (xhr, status, error) {
                        console.error('Lỗi thêm giỏ hàng:', error);
                    }
                });
            });
        });
    </script>
</x-booklayout>
