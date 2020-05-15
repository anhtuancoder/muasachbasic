<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\sach;
use App\dat_sach;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class PageCT extends Controller
{
    // hàm hiển thị all dữ liệu sách ra trang chủ
    public function getTrangChu() {
        $db_sach = DB::table('sach')->get();
        return view('page.trangchu', compact('db_sach'));
    }
    // hàm lưu thông tin mua sách vào session
    public function getGioHang(Request $req) {
        $db_sach2 = DB::table('sach')->where('id_sach', $req->id_sach)->first();
        $id = $req->id_sach;
        $ts = $db_sach2->ten_sach;
        $dg = $db_sach2->don_gia;
        $sl = 1;
        if(isset($_SESSION['giohang'][$id])) {
            foreach ($_SESSION['giohang'] as $key => $value) {
                if($_SESSION['giohang'][$key]['id'] == $id) {
                    $_SESSION['giohang'][$key]['sl'] = $_SESSION['giohang'][$key]['sl'] + 1;
                    $_SESSION['giohang'][$key]['tt'] = $_SESSION['giohang'][$key]['tt'] + $dg;
                }
            }
        } else {
            $arrGioHang = array(
                'id' => $id,
                'ts' => $ts,
                'dg' => $dg,
                'tt' => $dg,
                'sl' => $sl
            );
            $_SESSION['giohang'][$id] = $arrGioHang;
        }
        return view('page.giohang');
    }
    // hàm hiển lưu đơn hàng vào cơ sở dữ liệu
    public function notiDatHang(Request $req) {
        $dathang = $req->input('dathang');
        if(isset($dathang)) {
            foreach ($_SESSION['giohang'] as $key => $value) {
                $idsach = $value['id'];
                $tensach = $value['ts'];
                $soluong = $value['sl'];
                $thanhtien = $value['tt'];
                DB::insert('insert into dat_sach (ten_sach, so_luong, thanh_tien, id_sach) values (?, ?, ?, ?)', [$tensach, $soluong, $thanhtien,$idsach,]);
            }
            session_destroy();
        }
        return view('page.notidathang');
    }
}
