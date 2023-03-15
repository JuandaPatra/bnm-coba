<?php

namespace App\Exports;

use DB;
use App\Models\Contact;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ContactExport implements  FromCollection,ShouldAutoSize, WithHeadings, WithMapping
{

    protected $from_date;
    protected $to_date;
    
    use Exportable;

    
    function __construct($from_date,$to_date) {

        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }
    

    public function collection()
    {        
        if(ob_get_length() > 0) {
            ob_clean();
        }
        ob_start();
       return Contact::where('created_at', '>=',  $this->from_date)
                           ->where('created_at', '<=', $this->to_date)
                           ->get();
        //return Contact::all();
        
    }

    public function headings(): array{
        return [
            'Fullname',
            'Email',
            'Phone',
            'Company',
            'Address',
            'Date Created',
        ];
    }

    public function map($row): array{
        return [
            $row->fullname,
            $row->email,
            $row->phone,
            $row->company,
            $row->address,
            date('d/m/y H:i', strtotime($row->created_at))
            
        ];
    }

    public function columnFormats(): array {
        return [
            'F' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }

    public function styles(Worksheet $sheet) {
        return [ 1 => ['font' => ['bold' => true ]]];
    }
}
