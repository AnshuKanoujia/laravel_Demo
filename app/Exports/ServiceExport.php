<?php
   
namespace App\Exports;
   
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Bookings; 
use App\Financial_layouts;

class ServiceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $current_date=date('Y-m-d');
        // return Bookings::get_financial_report_data();
        return  Financial_layouts::get_financial_report_data($current_date); 
    }
    
    public function headings(): array
    {
        return [
            'Date',
            'Doc',
            'Description',
            'Booking Type',
            'Debit A/C',
            'Credit A/C',
            'Amount (INR)',
            'CC1',
            'CC2',
            'CC3'
            // 'Booking Status'
        ];
    }
}