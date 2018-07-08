<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use GuzzleHttp\Client;

class MedicalunitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    static $counter = 399;

    public function index()
    {
        $client = new Client();
        $request = $client->get('http://localhost:9000/rest/medicalunit/');
        $listunitmedis = json_decode($request->getBody()->getContents());
        return view('unitmedis', compact('listunitmedis'));
    }

    public function unitbaruindex()
    {
        //getwugroup
        $client = new Client();
        $request = $client->get('http://localhost:9000/rest/workingunitgroup/');
        $listwugroup = json_decode($request->getBody()->getContents());
        //getdokter
        $client = new Client();
        $request = $client->get('http://localhost:8080/rest/employee/');
        $listdokter = json_decode($request->getBody()->getContents());
        
        return view('addunitmedis', compact('listwugroup', 'listdokter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $idwugrup = $req->idkelmedis;
        $client = new Client();
        $request = $client->get('http://localhost:9000/rest/workingunitgroup/'.$idwugrup);
        $wugrup = json_decode($request->getBody()->getContents());

        $unitmedisbaru = new Client();
        $unitmedisbaru->systemid = self::$counter + 1;
        $unitmedisbaru->workunit_name = $req->namaunitmedis;
        $unitmedisbaru->memo = $req->keterangan;
        $unitmedisbaru->wugroup = [
            "systemid" => (int)($req->idkelmedis),
            "groupname" => $wugrup->groupname
        ];

        $response = $unitmedisbaru->post('http://localhost:9000/rest/medicalunit/', ['json' => $unitmedisbaru]);

        return redirect('medicalunit')->with('alert', 'Unit Medis baru telah berhasil di input ! Silahkan melanjutkan pekerjaan anda');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $idunitmedis = Input::get('idunitmedis');
        $client = new Client(['http_errors' => false]);
        $response = $client->delete('http://localhost:9000/rest/medicalunit/'.$idunitmedis);
        $statuscode = $response->getStatusCode();
        
        return redirect('medicalunit')->with('error', 'Unit Medis telah berhasil di hapus ! Silahkan melanjutkan pekerjaan anda');
    }
}
