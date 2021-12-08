<?php

namespace App\Http\Controllers;

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Style\Alignment;
use \PhpOffice\PhpSpreadsheet\Style\Border;
use App\Models\Mitras;
use App\Models\Surveys;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $surveys = Surveys::all();
        return view('download.download', compact('surveys'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
        ]);
        
        if($request->type == 1){
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
        } else if ($request->type == 2){
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $i = 1;

            
        } else if ($request->type == 3) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $i = 1;


        } else if ($request->type == 4){
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $i = 1;

            $surveys = Surveys::all();
            foreach ($surveys as $survey) {
                $sheet->setCellValue('A' . $i, $i);
                $sheet->setCellValue('B' . $i, $survey['name']);
                $sheet->setCellValue('C' . $i, $survey['start_date']);
                $sheet->setCellValue('D' . $i, $survey['end_date']);
                $i++;
            }
            $sheet->insertNewRowBefore(1, 1);
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Nama Survey');
            $sheet->setCellValue('C1', 'Tanggal Mulai');
            $sheet->setCellValue('D1', 'Tanggal Berakhir');

            //style table body
            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['argb' => '0000BFF'],
                    ],
                ],
            ];

            $sheet->getStyle('A1:D' . $i)
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

            $sheet->getStyle('A1:D1')
            ->applyFromArray($styleArray);

            //auto width all columns
            foreach (range('A', 'D') as $columnID) {
                $sheet->getColumnDimension($columnID)->setAutoSize(true);
            }

            //title
            $sheet->insertNewRowBefore(1, 3)
            ->mergeCells('A2:D2')
            ->getRowDimension('2')
            ->setRowHeight('20');
            $sheet->setCellValue('A2', 'Daftar Survey');

            unset($styleArray['borders']);
            $styleArray['font']['size'] = '16pt';
            $styleArray['alignment']['vertical'] = Alignment::VERTICAL_CENTER;

            $sheet->getStyle('A2:D2')
            ->applyFromArray($styleArray);

            // $sheet->insertNewColumnBefore('A', '2');

            //HTTP Header Information
            header('Content-Type: application\vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Daftar Survey.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
        } else if ($request->type == 5) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $i = 1;

        }

        $surveys = Surveys::all();
        return view('download.download', compact('surveys'));
    }
}
