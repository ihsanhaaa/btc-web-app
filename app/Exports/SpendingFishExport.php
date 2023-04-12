<?php

namespace App\Exports;

use App\Models\SpendingFish;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SpendingFishExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $incomeFish = SpendingFish::select('uraian', 'jenis', 'harga', 'keterangan', 'created_at')->get();

        $incomeFish = $incomeFish->map(function ($item) {
            return [
                'uraian' => $item->uraian,
                'jenis' => $item->jenis,
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
            'Jenis',
            'Harga',
            'Keterangan',
            'Dibuat Pada',
        ];
    }
}
