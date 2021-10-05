<?php

namespace App\Http\Controllers;

use App\Models\Mitras;
use App\Models\Educations;
use App\Models\Subdistricts;
use App\Models\Villages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        
        
        return view('mitra.mitra-create', [
            'educations' => Educations::all(),
            'villages' => Villages::all(),
            'subdistricts' => Subdistricts::all(),
            
        ]);
    }
    public function GetSubCatAgainstMainCatEdit($id){
        echo json_encode(DB::table('villages')->where('subdistrict', $id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
            'code' => 'required',
            'name' => 'required',
            'nickname' => 'required',
            'sex' => 'required',
            'photo' => 'image|file|max:1024',
            'education' => 'required',
            'birthdate' => 'required',
            'profession' => 'required',
            'address' => 'required',
            'village' => 'required',
            'subdistrict' => 'required'
        ]);

        $path = '';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $path = $image->store('images', 'public');
        }

        

        Mitras::create([
            'email' => $request->email,
            'code' => $request->code,
            'name' => $request->name,
            'nickname' => $request->nickname,
            'sex' => $request->sex,
            'photo' => $path,
            'education' => $request->education,
            'birtdate' => $request->birthdate,
            'profession' => $request->profession,
            'address' => $request->address,
            'village' => $request->village,
            'subdistrict' => $request->subdistrict
        ]);

        return redirect('/test');
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

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
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
            $mitraData["phone"] = count($mitra->phonenumbers) > 0 ? $mitra->phonenumbers[0]->phone : '';
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
