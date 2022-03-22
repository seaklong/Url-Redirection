<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qrcode;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QrcodeImport;
use App\Imports\QrcodeDel;
use Illuminate\Support\Facades\Validator;
use App\Imports\QrcodeReplace;
class QrcodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $code = $request->code;
        $youtubeLink = $request->youtubeLink;
        if($request->input('code')!= '' || $request->input('youtubeLink')!= ''){
            $qrcodes = Qrcode::where('status','<>',3)
                ->Where('codeksc','LIKE','%'.$code.'%')
                ->Where('youtubeLink','LIKE','%'.$youtubeLink.'%')
                ->orderBy('id', 'DESC')
                ->paginate(15);
            $qrcodes->appends([
                'codeksc' => $code
            ]);
        }else{
            $qrcodes = Qrcode::where('status','<>',3)
            ->orderBy('id', 'DESC')
            ->paginate(15);

        }
        $allLinks = Qrcode::where('status','<>',3)->count();
        $data['qrcode'] = $qrcodes;
        $data['allLinks'] = $allLinks;
        return view('admin.qrcode.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.qrcode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qrcode = new Qrcode();
        $qrcode->name = $request['name'];
        $qrcode->grade = $request['grade'];
        $qrcode->link =$request['link'];
        $qrcode->codeksc =$request['code'];
        $qrcode->embedLink =$request['embedLink'];
        $qrcode->youtubeLink =$request['youtubeLink'];
        $qrcode->status=$request['status'];
        $qrcode->save();
        return redirect("/qrcodes");
    }

    /**
     * Import file insert into table Qrcode
     */

    public function ImportQrcode(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'file' => ['required'], //,'mimes:pdf,docx','max:2048' ,'mimes:xlsx'
            'invoiceStatus' => ['required'] 
           // file validation
            
        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form
        }
        else
        {
            $status = $request->invoiceStatus;
            $file = $request->file('file');
            //handle the form 
            if ($status == 1 || $status == 2) {
                $import = new QrcodeImport;
                Excel::import($import, $file);
                $array = $import->getArray();
            } elseif ($status == 0){
                $import = new QrcodeDel;
                Excel::import($import, $file);
                $array = $import->getArray();                
            }
           
             return redirect("/qrcodes");
        }  
        // dd($request->btnImport);
        
    }

    /**
     * Import file then delete data Qrcode
     */

    public function ImportDel(Request $request)
    {
        $import = new QrcodeDel;
        Excel::import($import, $request->file('delete'));
        $array = $import->getArray();
        return redirect("/qrcodes");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qrcode = Qrcode::find($id);
        return view('admin.qrcode.edit')->with(compact('qrcode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'   =>      'required',
                'codeksc'  => 'required',
                'link'  => 'required',
                'grade'  => 'required',
                'embedLink'  => 'required',
                'youtubeLink'  => 'required',
                'status'  => 'required'
            ]
        );
       
        Qrcode::where('id',$id)->update([
            'name' => $request['name'],
            'codeksc' => $request['codeksc'],
            'grade' => $request['grade'],
            'link' => $request['link'],
            'embedLink' => $request['embedLink'],
            'youtubeLink' => $request['youtubeLink'],
            'status' => $request['status'],
        ]);

        return redirect("/qrcodes");
    }
     /**
     * disable or block qrcode
     */
    public function disableQrcode(Request $request,$id)
    {
        $status = $request->status;
        Qrcode::where('id',$id)->update(["status"=>$status]);
        
        return response()->json(['success'=> true]);
    }
    /**
     * delete update status=3
     */
    public function deleteQrcode(Request $request,$id)
    {
        // $status = $request->status;
        Qrcode::where('id',$id)->update(["status"=>3]);
        
        return response()->json(['success'=> true]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
