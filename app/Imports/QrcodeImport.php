<?php

namespace App\Imports;

use App\Models\Qrcode;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\ToArray;
use Illuminate\Http\Request;
class QrcodeImport implements ToArray
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
    // }
    public function array(array $rows)
    {
       // dd();
        foreach (array_slice($rows, 1) as $row) {
              //insert into Qrcode
            $codeksc = $row[0];
            $checkData = Qrcode::where('codeksc',$codeksc)->count();
            // dd($row);
            if($checkData < 1)
            {
                $qr = new Qrcode();
                $qr->name = $row[5];
                $qr->grade = $row[4];
                 $qr->link = "http://kounsvachhlat.com/v/".$codeksc;
                // $qr->link = $row[1];
                $qr->codeksc = $codeksc;
                $qr->embedLink = $row[3];
                $qr->youtubeLink = $row[2];
                $qr->created_at = \Carbon\Carbon::now();
                $qr->updated_at = \Carbon\Carbon::now();
                $qr->save();

            }else{

                Qrcode::where('codeksc',$codeksc)->update([
                    'name' => $row[5],
                    'codeksc' => $codeksc,
                    'grade' => $row[4],
                    // 'link' => $row[1],
                    'link' => "http://kounsvachhlat.com/v/".$codeksc,
                    'embedLink' => $row[3],
                    'youtubeLink' => $row[2],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]);

            }             
             //end Qrcode
        }

    }
    public function getArray(): array
    {
        return $this->data;
    }
}
