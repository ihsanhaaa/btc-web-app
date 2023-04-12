<?php

namespace App\Exports;

use App\Models\IncomeFish;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IncomeFishExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $incomeFish = IncomeFish::select('tanggal_jual', 'jumlah_bobot', 'harga_jual', 'total_penjualan', 'created_at')->get();

        $incomeFish = $incomeFish->map(function ($item) {
            return [
                'tanggal_jual' => $item->tanggal_jual,
                'jumlah_bobot' => $item->jumlah_bobot,
                'harga_jual' => $item->harga_jual,
                'total_penjualan' => $item->total_penjualan,
                'created_at' => Carbon::parse($item->created_at)->format('d/m/Y')
            ];
        });

        return new Collection($incomeFish->all());
    }

    public function headings(): array
    {
        return [
            'Tanggal Penjualan',
            'Jumlah Bobot',
            'Harga Jual',
            'Total Penjualan',
            'Dibuat Pada',
        ];
    }
}
