<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use GuzzleHttp\Client;

class HrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $request = $client->get('http://localhost:8080/rest/employee/');
        $listdokter = json_decode($request->getBody()->getContents());
        return view('hr', compact('listdokter'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $noindukdokter = Input::get('noinduk');
        $client = new Client();
        $request = $client->get('http://localhost:8080/rest/employee/'.$noindukdokter);
        $datadokter = json_decode($request->getBody()->getContents());
        return view('detaildokter', compact('datadokter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $dokter = new Client();

        $dokter->systemid = Input::get('noinduk');
        $dokter->firstname = Input::get('firstname');
        $dokter->prefixtitle = Input::get('preftitle');
        $dokter->suffixtitle = Input::get('suftitle');
        $dokter->homephone = Input::get('kontak');
        $dokter->jobspeciality = [
            'specialityName' => Input::get('spesialis'),
            'systemId' => Input::get('spesialisid'),
            'memo' => Input::get('spesialis')
        ];

        $response = $dokter->put('http://localhost:8080/rest/employee/', ['json' => $dokter]);
        $response = $response->getBody()->getContents();
        
        return redirect('hr')->with('alert', 'Data Dokter telah berhasil di update ! Silahkan melanjutkan pekerjaan anda');
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
        $noindukdokter = Input::get('iddokter');
        $client = new Client();
        $request = $client->delete('http://localhost:8080/rest/employee/'.$noindukdokter);
        return redirect('hr')->with('error', 'Data Dokter telah di hapus ! Silahkan melanjutkan pekerjaan anda');
    }
}
