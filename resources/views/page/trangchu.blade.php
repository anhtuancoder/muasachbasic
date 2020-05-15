@extends('master') <!--kế thừa từ trang master.blade.php-->
@section('content') <!--khai báo đây là phần chứa dữ liệu-->
<form id="mua_sach" action = "" method = "POST">
    <h3>TRANG CHỦ</h3>
    <table>
            <tr>
                <th>Tên sách</th>
                <th>Tác giả</th>
                <th>Thể loại</th>
                <th>Đơn giá</th>
                <th>Mua sách</th>
            </tr>
            @foreach($db_sach as $value)
                <tr>
                    <td>
                        {{$value->ten_sach}}
                    </td>
                    <td>
                        {{$value->tac_gia}}
                    </td>
                    <td>
                        {{$value->the_loai}}
                    </td>
                <td>
                    {{$value->don_gia}} vnđ
                </td>
                <td>
                    <button><a href="{{route('gio-hang', $value->id_sach)}}">Mua sách</a></button> <!--chuyển đến trang giỏ hàng với id của sách được chọn vầ lưu trong session-->
                </td>
            </tr>
        @endforeach
    </table></br></br>
</form>
@endsection
