<?php

namespace App\Http\Controllers;

use App\Models\Assessments;
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Style\Alignment;
use \PhpOffice\PhpSpreadsheet\Style\Border;
use App\Models\Mitras;
use App\Models\Statuses;
use App\Models\Surveys;
use DateTime;
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

        if ($request->type == 1) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $i = 1;

            $mitras = Mitras::all();
            foreach ($mitras as $mitra) {
                $sheet->setCellValue('A' . $i, $i);
                $sheet->setCellValue('B' . $i, $mitra['code']);
                $sheet->setCellValue('C' . $i, $mitra['email']);
                $sheet->setCellValue('D' . $i, $mitra['name']);
                $sheet->setCellValue('E' . $i, $mitra['nickname']);
                $sheet->setCellValue('F' . $i, $mitra->phonenumbers->implode('phone', '; '));
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
            $sheet->setCellValue('B1', 'Kode');
            $sheet->setCellValue('C1', 'Email');
            $sheet->setCellValue('D1', 'Nama Lengkap');
            $sheet->setCellValue('E1', 'Nama Panggilan');
            $sheet->setCellValue('F1', 'No Handphone');
            $sheet->setCellValue('G1', 'Jenis Kelamin');
            $sheet->setCellValue('H1', 'Foto');
            $sheet->setCellValue('I1', 'Pendidikan');
            $sheet->setCellValue('J1', 'Tanggal Lahir');
            $sheet->setCellValue('K1', 'Profesi');
            $sheet->setCellValue('L1', 'Alamat');
            $sheet->setCellValue('M1', 'Kecamatan');
            $sheet->setCellValue('N1', 'Kelurahan');

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
                    'top' => [
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
            $sheet->setCellValue('A2', 'Biodata Mitra');
            $styleArray['alignment']['vertical'] = Alignment::VERTICAL_CENTER;
            $styleArray['alignment']['horizontal'] = Alignment::HORIZONTAL_LEFT;

            unset($styleArray['borders']);
            $styleArray['font']['size'] = '14pt';

            $sheet->getStyle('A2:N2')
                ->applyFromArray($styleArray);

            //HTTP Header Information
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Biodata Mitra.xls"');
            header('Cache-Control: max-age=0');

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save('php://output');
        } else if ($request->type == 3) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $i = 1;

            $idsurvey = $request->survey;
            $survey = Surveys::find($idsurvey);
            $mitras = $survey->mitras;
            foreach ($mitras as $mitra) {
                $sheet->setCellValue('A' . $i, $i);
                $sheet->setCellValue('B' . $i, $mitra['email']);
                $sheet->setCellValue('C' . $i, $mitra['name']);
                $sheet->setCellValue('D' . $i, $mitra->pivot->phone_survey);
                $sheet->setCellValue('E' . $i, Statuses::find($mitra->pivot->status_id)->name);
                $sheet->setCellValue('F' . $i, $mitra->subdistrictdetail->name);
                $sheet->setCellValue('G' . $i, $mitra->villagedetail->name);
                $sheet->setCellValue('H' . $i, $mitra['address']);
                $assessment = null;
                if ($mitra->pivot->assessment_id != null) {
                    $assessmentRow = Assessments::find($mitra->pivot->assessment_id);
                    $assessment = ($assessmentRow->cooperation + $assessmentRow->communication + $assessmentRow->dicipline + $assessmentRow->itskill + $assessmentRow->integrity) / 5;
                }
                $rating = $assessment != null ? number_format((float)$assessment, 2, '.', '') : 'Belum Dinilai';
                $sheet->setCellValue('I' . $i, $rating);
                $i++;
            }
            $sheet->insertNewRowBefore(1, 1);
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Email');
            $sheet->setCellValue('C1', 'Nama');
            $sheet->setCellValue('D1', 'No Handphone');
            $sheet->setCellValue('E1', 'Status');
            $sheet->setCellValue('F1', 'Kecamatan');
            $sheet->setCellValue('G1', 'Kelurahan');
            $sheet->setCellValue('H1', 'Alamat');
            $sheet->setCellValue('I1', 'Nilai');

            //style table body
            // $styleArray = [
            //     'borders' => [
            //         'allBorders' => [
            //             'borderStyle' => Border::BORDER_THIN,
            //             'color' => ['argb' => '0000BFF'],
            //         ],
            //     ],
            // ];

            // $sheet->getStyle('A1:H' . $i)
            //     ->applyFromArray($styleArray);

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
                    'top' => [
                        'borderStyle' => Border::BORDER_MEDIUM,
                        'color' => ['argb' => '0000BFF'],
                    ],
                ],
                'font' => [
                    'bold' => true,
                ],
            ];

            $sheet->getStyle('A1:I1')
                ->applyFromArray($styleArray);

            //auto width all columns
            foreach (range('A', 'I') as $columnID) {
                $sheet->getColumnDimension($columnID)->setAutoSize(true);
            }

            //title
            $sheet->insertNewRowBefore(1, 3)
                ->mergeCells('A2:I2')
                ->getRowDimension('2')
                ->setRowHeight('20');
            $sheet->setCellValue('A2', 'Mitra Survey ' . $survey->name);

            unset($styleArray['borders']);
            $styleArray['font']['size'] = '14pt';
            $styleArray['alignment']['vertical'] = Alignment::VERTICAL_CENTER;
            $styleArray['alignment']['horizontal'] = Alignment::HORIZONTAL_LEFT;

            $sheet->getStyle('A2:I2')
                ->applyFromArray($styleArray);

            // $sheet->insertNewColumnBefore('A', '2');

            //HTTP Header Information
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Mitra Survey ' . $survey->name . '.xls"');
            header('Cache-Control: max-age=0');

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save('php://output');
        } else if ($request->type == 4) {
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
            // $styleArray = [
            //     'borders' => [
            //         'allBorders' => [
            //             'borderStyle' => Border::BORDER_THIN,
            //             'color' => ['argb' => '0000BFF'],
            //         ],
            //     ],
            // ];

            // $sheet->getStyle('A1:D' . $i)
            //     ->applyFromArray($styleArray);

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
                    'top' => [
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
            $styleArray['font']['size'] = '14pt';
            $styleArray['alignment']['vertical'] = Alignment::VERTICAL_CENTER;

            $sheet->getStyle('A2:D2')
                ->applyFromArray($styleArray);

            // $sheet->insertNewColumnBefore('A', '2');

            //HTTP Header Information
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Daftar Survey.xls"');
            header('Cache-Control: max-age=0');

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save('php://output');
        }

        return view('download.download', compact('surveys'));
    }
}
