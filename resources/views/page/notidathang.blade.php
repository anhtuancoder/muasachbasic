@extends('master')
@section('content')
    <form action="" method="POST" style="text-align: center">
        <b>Đặt hàng thành công!</b></br>
        <button><a href = "{{route('trang-chu')}}">Tiếp tục với đơn hàng mới!</a></button>
    </form>
@endsection
