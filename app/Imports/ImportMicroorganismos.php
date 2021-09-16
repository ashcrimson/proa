<?php

namespace App\Imports;

use App\Models\Microorganismo;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportMicroorganismos implements ToCollection,WithBatchInserts,WithChunkReading,WithHeadingRow
{
    use Importable;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $index => $fila) {
            Microorganismo::firstOrCreate([
                'nombre' => $fila['nombre_microorganismo'],
                'morfologia' => $fila['morfologia']
            ]);
        }
    }

    public function batchSize(): int
    {
        return  1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
