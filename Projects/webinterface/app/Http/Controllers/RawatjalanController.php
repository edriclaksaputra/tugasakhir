<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use GuzzleHttp\Client;

class RawatjalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $request = $client->get('http://localhost:9010/rest/outpatient/');
        $listrawatjalan = json_decode($request->getBody()->getContents());
        for ($i=0; $i < count($listrawatjalan); $i++) { 
            $client = new Client();
            $request = $client->get('http://localhost:9000/rest/medicalunit/'.$listrawatjalan[$i]->medunit);
            $medunit = json_decode($request->getBody()->getContents());

            $listrawatjalan[$i]->workunit_name = $medunit->workunit_name;

            $client = new Client();
            $request = $client->get('http://localhost:8090/rest/customer/'.$listrawatjalan[$i]->hc);
            $hcustomer = json_decode($request->getBody()->getContents());

            $listrawatjalan[$i]->hcustomer = $hcustomer->firstname;
            $listrawatjalan[$i]->waktudaftar = $listrawatjalan[$i]->registertime;
        }
        return view('rawatjalan', compact('listrawatjalan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function antrianbaru()
    {
        //listpasien
        $client = new Client();
        $request = $client->get('http://localhost:8090/rest/customer/');
        $listpasien = json_decode($request->getBody()->getContents());
        return view ('tambahrawatjalan', compact('listpasien'));
    }

    public function pilihunitmedis()
    {
        $idpasien = Input::get('idpasien');
        $client = new Client();
        $request = $client->get('http://localhost:9000/rest/medicalunit/');
        $listunitmedis = json_decode($request->getBody()->getContents());
        return view ('pilihunitmedisrawatjalan', compact('listunitmedis', 'idpasien'));
    }

    public function create(Request $req)
    {
        $antrianrawatjalanbaru = new Client();
        $antrianrawatjalanbaru->hc = $req->idpasien;
        $antrianrawatjalanbaru->medunit = $req->idunitmedis;
        $antrianrawatjalanbaru->memo = $req->keluhan;
        $antrianrawatjalanbaru->registertime = $req->tanggalhariini;

        $response = $antrianrawatjalanbaru->post('http://localhost:9010/rest/outpatient/', ['json' => $antrianrawatjalanbaru]);

        return redirect('rawatjalan')->with('alert', 'Antrian rawat jalan baru telah berhasil di input ! Silahkan melanjutkan pekerjaan anda');
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
        $noregisantrian = Input::get('noregishapus');
        $client = new Client(['http_errors' => false]);
        $response = $client->delete('http://localhost:9010/rest/outpatient/'.$noregisantrian);
        $statuscode = $response->getStatusCode();

        return redirect('rawatjalan')->with('error', 'Antrian telah di cancel ! Silahkan melanjutkan pekerjaan anda');
    }
}
