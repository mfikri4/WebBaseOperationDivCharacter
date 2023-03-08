<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function create()
    {
        return view('calculation.create');
    }

    public function upper($string){

        return strtoupper($string);
    }

    public function lower($string){

        return strtolower($string);
    }


    public function length($string){

        return strlen($string);
    }

    public function store(Request $request)
    {
        //mengambil semua data
        $data = $request->all();

        //menghapus karakter spasi
        $dt_input1 = str_replace(' ', '',$data['input1']);
        $dt_input2 = str_replace(' ', '',$data['input2']);

        //karakter1 upper
        $char_input1_upper = $this->upper($dt_input1);

        //karakter1 lower
        $char_input1_lower = $this->lower($dt_input1);

        //karakter1 upper
        $char_input2_upper = $this->upper($dt_input2);

        //array unique
        $arr_input2 = array_unique(str_split($char_input2_upper));

        //karakter2 unique
        $char_2 = implode('',$arr_input2);

        //panjang karakter 1
        $length_dt1 = $this->length($dt_input1);

        //panjang karakter2 tanpa duplicate
        $length_dt2 = $this->length($char_2);

        //nilai karakter yang sama
        $match=0;

        //perulangan match
        for($i=0; $i<$length_dt2; $i++){   
            if(str_contains($char_input1_upper, $char_2[$i]) || str_contains($char_input1_lower, $char_2[$i])){
                $match = $match + 1;
            }
        }

        //hasil hitung operasi karakter sama / karakter1
        $total = $match/$length_dt1 ;
        $total_persentase = $total*100;

        return view('calculation.hasil', compact('dt_input1','dt_input2','length_dt1','length_dt2','total','match','total_persentase'));
    }
}
