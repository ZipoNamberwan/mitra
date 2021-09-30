<?php

namespace App\Http\Controllers;

use App\Models\Mitras;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;
use PhpParser\Node\Expr\AssignOp\Pow;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mitra.mitra-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mitra.mitra-create');
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
        return view('mitra.mitra-view');
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
    public function destroy(Request $request, $email)
    {
        Mitras::destroy($request->email);
        return redirect('mitra.mitra-index')->with('sukses', 'Data Telah Dihapus');
    }

    public function data(Request $request)
    {
        $recordsTotal = Mitras::count();
        $recordsFiltered = Mitras::where('name', 'like', '%' . $request->search["value"] . '%')
            ->orWhere('nickname', 'like', '%' . $request->search["value"] . '%')
            ->orWhere('email', 'like', '%' . $request->search["value"] . '%')
            ->count();

        $orderColumn = 'created_at';
        $orderDir = 'DESC';
        if ($request->order != null) {
            if ($request->order[0]['dir'] == 'asc') {
                $orderDir = 'asc';
            } else {
                $orderDir = 'desc';
            }
            if ($request->order[0]['column'] == '2') {
                $orderColumn = 'name';
            } else if ($request->order[0]['column'] == '3') {
                $orderColumn = 'email';
            }
        }
        $mitras = Mitras::where('name', 'like', '%' . $request->search["value"] . '%')
            ->orWhere('nickname', 'like', '%' . $request->search["value"] . '%')
            ->orWhere('email', 'like', '%' . $request->search["value"] . '%')
            ->orderByRaw($orderColumn . ' ' . $orderDir)
            ->skip($request->start)
            ->take($request->length)
            ->get();
        $mitrasArray = array();
        $i = 1;
        foreach ($mitras as $mitra) {
            $mitraData = array();
            $mitraData["index"] = $i;
            $mitraData["name"] = $mitra->name;
            $mitraData["photo"] = asset('storage/' . $mitra->photo);
            $mitraData["nickname"] = $mitra->nickname;
            $mitraData["email"] = $mitra->email;
            $mitraData["phone"] = count($mitra->phonenumbers)>0 ? $mitra->phonenumbers[0]->phone : '';
            $mitraData["id"] = $mitra->email;
            $mitrasArray[] = $mitraData;
            $i++;
        }
        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $mitrasArray
        ]);
    }
}
