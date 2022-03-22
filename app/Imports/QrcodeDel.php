<?php

namespace App\Imports;

use App\Models\Qrcode;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\ToArray;

class QrcodeDel implements ToArray
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new Qrcode([
    //         //
    //     ]);
    // }ចង់រកស៊ីឆាប់មាន រកស៊ីតិចជាង៥ឆ្នាំក្លាយជាសេដ្ឋី គួរធ្វើបែបណា?

    public function array(array $rows)
    {
 
        foreach (array_slice($rows, 1) as $row) {
              //insert into Qrcode
            $codeksc = $row[0];
            $checkData = Qrcode::where('codeksc',$codeksc)->count();
//dd($checkData);
            if($checkData > 0)
            {
              //   dd($checkData);
                $res = Qrcode::where('codeksc',$codeksc)->delete();
            }             
             //end Qrcode
        }
    }
    public function getArray(): array
    {
        return $this->data;
    }
}
