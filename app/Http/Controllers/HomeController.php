<?php

namespace App\Http\Controllers;
use App\User;
use App\Transaksi;
use App\TransaksiToko;
use Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function showDBAdmin()
    {

        $x = User::where('role','=','petugasbumdes')->count();
        $y = User::where('role','=','petugastoko')->count();

        return view('homeAdmin')
        ->with('user', $x)
        ->with('user', $y);
    }
     public function showDBBumdes()
    {

        $y = User::where('role','=','petugastoko')->count();
        $z = Transaksi::count();
        $x = Transaksi::all();
        $q = 0;
        foreach ($x as $transaksi) {
            $q = $q + $transaksi->setoran + $transaksi->laba_toko;
        }
        $r = 0;
        foreach ($x as $transaksi) {
            $r = $r + $transaksi->laba_bumdes;
        }

        return view('homeBumdes')
        ->with('user', $y)
        ->with('jumlah', $q)
        ->with('transaksi' , $z)
        ->with('total' , $r);
        
    }
    public function showDBToko()
    {
        $a = TransaksiToko::count();
        $b = TransaksiToko::count();
        $c = TransaksiToko::all();
        $d = 0;
        foreach ($c as $transaksiToko) {
            $d = $d + $transaksiToko->total_belanja;
        }

        return view('homeToko')
        ->with('transaksiToko', $a)
        ->with('transaksiToko', $b)
        ->with('jumlah', $d);
    }
}
