<?php

namespace App\Exports;

use App\Property;
use Maatwebsite\Excel\Concerns\FromArray;

class PropertiesExport implements FromArray
{
    public function array(): array
    {
        $all = Property::orderBy('id', 'ASC')->get();
        $cellData = [];
        $cellData[0] = ['编号', '收支', '金额', '时间', '备注'];
        foreach ($all as $item) {
            $cellData[] = [$item['id'], $item['sign'] ? '收入' : '支出', $item['amount'], $item['time'], $item['mark']];
        }
        return $cellData;
    }
}
