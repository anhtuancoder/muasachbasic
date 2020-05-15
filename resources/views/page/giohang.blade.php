@extends('master')
@section('content')
<form id = "mua_sach" action = "{{route('noti-dat-hang')}}" method = "GET" style="text-align: center">
    <h3>GIỎ HÀNG</h3>
    <table style="font-family: arial, sans-serif;border: 2px solid black;width: 100%;margin: auto;text-align: center;">
        <tr>
            <th style="border: 1px solid #dddddd; padding: 5px; background-color: #dddddd;">Tên sách</th>
            <th style="border: 1px solid #dddddd; padding: 5px; background-color: #dddddd;">Đơn giá</th>
            <th style="border: 1px solid #dddddd; padding: 5px; background-color: #dddddd;">Số Lượng</th>
            <th style="border: 1px solid #dddddd; padding: 5px; background-color: #dddddd;">Thành tiền</th>
            <th style="border: 1px solid #dddddd; padding: 5px; background-color: #dddddd;">Tổng tiền</th>
        </tr>
        <?php
            foreach ($_SESSION['giohang'] as $key => $value) {
        ?>
        <tr>
            <!-- In thông tin mua sách vào bảng -->
            <td style="text-align: center;border:1px solid black;"><?php echo $value['ts'] ?></td>
            <td style="text-align: center;border:1px solid black;"><?php echo $value['dg'] ?> đ</td>
            <td style="text-align: center;border:1px solid black;"><?php echo $value['sl'] ?></td>
            <td style="text-align: center;border:1px solid black;"><?php echo $value['tt'] ?></td>
        <?php
            } // đóng vòng lặp foreach
        ?>
        <td style="text-align: center;border:1px solid black;">
            <?php
                $tongTien = 0;
                foreach ($_SESSION["giohang"] as $key => $value) {
                    // vòng lặp tính tổng số tiền mua hàng
                    for($j = 0; $j < count($_SESSION["giohang"]); $j++) {
                        $tongTien += $value['tt'] / count($_SESSION["giohang"]); // Tổng số tiền chia cho số phần tử của mảng sesion
                    }
                }
                echo $tongTien." đ";
            ?>
        </td>
        </tr>
    </table></br>
    <input type="submit" name="dathang" value="Đặt hàng">
    <button><a href = "{{route('trang-chu')}}">Quay lại</a></button>
</form>
@endsection
