<?php

namespace App\Http\Controllers;

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Style\Alignment;
use \PhpOffice\PhpSpreadsheet\Style\Border;
use App\Http\Controllers\Controller;
use App\Models\Mitras;
use App\Models\Educations;
use App\Models\PhoneNumbers;
use App\Models\Subdistricts;
use App\Models\User;
use App\Models\Villages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'subdistricts' => Subdistricts::all(),
        ]);
    }
    public function getVillage($id)
    {
        return json_encode(Villages::where('subdistrict', $id)->get());
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
            'email' => 'required|email|unique:mitras,email',
            'phone' => 'required',
            'name' => 'required',
            'sex' => 'required',
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

        $mitracounter = DB::table('counter')->where('id', 'mitras_counter')->first()->value + 1;
        DB::table('counter')->where('id', 'mitras_counter')
            ->update(['value' => $mitracounter]);
        $mitra = Mitras::create([
            'email' => $request->email,
            'name' => $request->name,
            'code' => sprintf("%05s", $mitracounter),
            'nickname' => $request->nickname,
            'sex' => $request->sex,
            'photo' => $path,
            'education' => $request->education,
            'birthdate' => $request->birthdate,
            'profession' => $request->profession,
            'address' => $request->address,
            'village' => $request->village,
            'subdistrict' => $request->subdistrict
        ]);

        PhoneNumbers::create([
            'phone' => $request->phone,
            'is_main' => true,
            'mitra_id' => $mitra->email
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user == null) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => '',
                'avatar' => $mitra->photo
            ]);
        } else {
            $data = ([
                'email' => $request->email,
                'name' => $request->name,
                'avatar' => $mitra->photo,
            ]);
            $user->update($data);
        }

        return redirect('/mitras')->with('success-create', 'Data Mitra telah direkam!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mitra = Mitras::where('email', $id)->first();
        return view('mitra.mitra-view', compact('mitra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mitra = Mitras::where('email', $id)->first();
        return view(
            'mitra.mitra-edit',
            compact('mitra'),
            [
                'educations' => Educations::all(),
                'subdistricts' => Subdistricts::all()
            ]
        );
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
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'sex' => 'required',
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

        $mitra = Mitras::where('email', $id)->first();
        $data = ([
            'email' => $request->email,
            'name' => $request->name,
            'nickname' => $request->nickname,
            'sex' => $request->sex,
            'photo' => $path == '' ? $mitra->photo : $path,
            'education' => $request->education,
            'birthdate' => $request->birthdate,
            'profession' => $request->profession,
            'address' => $request->address,
            'village' => $request->village,
            'subdistrict' => $request->subdistrict
        ]);
        $mitra->update($data);

        $user = User::where('email', $id)->first();
        if ($user == null) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => '',
                'avatar' => $mitra->photo
            ]);
        } else {
            $data = ([
                'email' => $request->email,
                'name' => $request->name,
                'avatar' => $mitra->photo,
            ]);
            $user->update($data);
        }

        return redirect('/mitras')->with('success-create', 'Data Mitra telah direkam!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mitra = Mitras::find($id);
        $mitra->delete();
        $user = User::where('email', $id)->first();
        if ($user != null) {
            $user->delete();
        }
        return redirect('/mitras')->with('success-delete', 'Data Mitra telah dihapus!');
    }

    public function data(Request $request)
    {
        $recordsTotal = Mitras::count();

        $orderColumn = 'created_at';
        $orderDir = 'desc';
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
        $searchkeyword = $request->search['value'];
        $mitras = Mitras::all();
        if ($searchkeyword != null) {
            $mitras = $mitras->filter(function ($q) use (
                $searchkeyword
            ) {
                return Str::contains(strtolower($q['name']), strtolower($searchkeyword)) ||
                    Str::contains(strtolower($q['email']), strtolower($searchkeyword)) ||
                    Str::contains(strtolower($q['nickname']), strtolower($searchkeyword));
            });
        }
        $recordsFiltered = $mitras->count();

        if ($orderDir == 'asc') {
            $mitras = $mitras->sortBy($orderColumn)->skip($request->start)
                ->take($request->length);
        } else {
            $mitras = $mitras->sortByDesc($orderColumn)->skip($request->start)
                ->take($request->length);
        }
        $mitrasArray = array();
        $i = $request->start + 1;
        foreach ($mitras as $mitra) {
            $mitraData = array();
            $mitraData["index"] = $i;
            $mitraData["name"] = $mitra->name;
            $mitraData["photo"] = $mitra->photo != null ? asset('storage/' . $mitra->photo) : asset('storage/images/profile.png');
            $mitraData["nickname"] = $mitra->nickname;
            $mitraData["email"] = $mitra->email;
            $mitraData["rating"] = $mitra->avgrating();
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

    public function mitrasexport()
    {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $i = 1;

        $mitras = Mitras::all();
        foreach ($mitras as $mitra) {
            $sheet->setCellValue('A' . $i, $i);
            $sheet->setCellValue('B' . $i, $mitra['code']);
            $sheet->setCellValue('C' . $i, $mitra['email']);
            $sheet->setCellValue('D' . $i, $mitra['phone']);
            $sheet->setCellValue('E' . $i, $mitra['name']);
            $sheet->setCellValue('F' . $i, $mitra['nickname']);
            $sheet->setCellValue('G' . $i, $mitra['sex']);
            $sheet->setCellValue('H' . $i, $mitra['photo']);
            $sheet->setCellValue('I' . $i, $mitra->educationdetail->name);
            $sheet->setCellValue('J' . $i, $mitra['birthdate']);
            $sheet->setCellValue('K' . $i, $mitra['profession']);
            $sheet->setCellValue('L' . $i, $mitra['address']);
            $sheet->setCellValue('M' . $i, $mitra->subdistrictdetail->name);
            $sheet->setCellValue('N' . $i, $mitra->villagedetail->name);
            $i++;
        }
        $sheet->insertNewRowBefore(1, 1);
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Code');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'No Handphone');
        $sheet->setCellValue('E1', 'Nama Lengkap');
        $sheet->setCellValue('F1', 'Nama Panggilan');
        $sheet->setCellValue('G1', 'Jenis Kelamin');
        $sheet->setCellValue('H1', 'Foto');
        $sheet->setCellValue('I1', 'Pendidikan');
        $sheet->setCellValue('J1', 'Tanggal Lahir');
        $sheet->setCellValue('K1', 'Profesi');
        $sheet->setCellValue('L1', 'Alamat');
        $sheet->setCellValue('M1', 'Kecamatan');
        $sheet->setCellValue('N1', 'Kelurahan');

        //style table body
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '0000BFF'],
                ],
            ],
        ];

        $sheet->getStyle('A1:N' . $i)
            ->applyFromArray($styleArray);

        //style table header
        $styleArray = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['argb' => '0000BFF'],
                ],
            ],
            'font' => [
                'bold' => true,
            ],
        ];

        $sheet->getStyle('A1:N1')
            ->applyFromArray($styleArray);

        //auto width all columns
        foreach (range('A', 'N') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        //title
        $sheet->insertNewRowBefore(1, 3)
            ->mergeCells('A2:N2')
            ->getRowDimension('2')
            ->setRowHeight('20');
        $sheet->setCellValue('A2', 'Data Mitra');

        unset($styleArray['borders']);
        $styleArray['font']['size'] = '16pt';
        $styleArray['alignment']['vertical'] = Alignment::VERTICAL_CENTER;

        $sheet->getStyle('A2:N2')
            ->applyFromArray($styleArray);

        // $sheet->insertNewColumnBefore('A', '2');

        //HTTP Header Information
        header('Content-Type: application\vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Mitra.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
