<?php

namespace App\Http\Controllers;

use App\Modelname;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Mail;

class ModelnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_excel()
    {
        return view('add_excel');
    }

    public function save_excel(Request $request)
    {

        if($request->hasFile('excel_file'))
        {
            $path = $request->file('excel_file')->getRealPath();
            $data = Excel::load($path, function($reader)
            {
            })->get();

            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['name' => $value->name, 'email' => $value->email , 'password' => $value->password];
                }
                if(!empty($arr)){
                    DB::table('tb_user')->insert($arr);
                    dd('Insert Record successfully.');
                }
            }
        }
        dd('No File Found.');
    }

    public function basic_email() {
        $data = array('name'=>"Virat Gandhi");

        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('kabir14235@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
            $message->from('ecofab.pts@gmail.com','Test Mail');
        });

        echo "Email Sent. Check your inbox.";

    }

    public function attachment_email() {
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
            $message->to('kabir14235@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
            $message->attach('C:\Users\Administrator\Desktop\check image\4.jpg');
//            $message->attach('C:\Users\Administrator\Desktop\check image\excel');
            $message->from('ecofab.pts@gmail.com','Test Mail');
        });
        echo "Email Sent with attachment. Check your inbox.";
    }

    function excel()
    {
        $customer_data = DB::table('tb_user')->get()->toArray();
        $customer_array[] = array('name', 'email', 'password');
        foreach($customer_data as $customer)
        {
            $customer_array[] = array(
                'name'  => $customer->name,
                'email'   => $customer->email,
                'password'    => $customer->password

            );
        }
        Excel::create('Customer Data', function($excel) use ($customer_array){
            $excel->setTitle('Customer Data');
            $excel->sheet('Customer Data', function($sheet) use ($customer_array){
                $sheet->fromArray($customer_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelname  $modelname
     * @return \Illuminate\Http\Response
     */
    public function show(Modelname $modelname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelname  $modelname
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelname $modelname)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelname  $modelname
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelname $modelname)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelname  $modelname
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelname $modelname)
    {
        //
    }
}
