<?php

namespace App\Exports;

use App\Models\DailySpending;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DailySpendingExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $incomeFish = DailySpending::select('uraian', 'harga', 'keterangan', 'created_at')->get();

        $incomeFish = $incomeFish->map(function ($item) {
            return [
                'uraian' => $item->uraian,
                'harga' => $item->harga,
                'keterangan' => $item->keterangan,
                'created_at' => Carbon::parse($item->created_at)->format('d/m/Y')
            ];
        });

        return new Collection($incomeFish->all());
    }

    public function headings(): array
    {
        return [
            'Uraian',
            'Harga',
            'Keterangan',
            'Dibuat Pada',
        ];
    }
}
