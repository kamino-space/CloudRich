<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class ShowController extends Controller
{
    private $totalPro = 0;
    private $totalInc = 0;
    private $totalExp = 0;

    public function TotalProperty()
    {
        foreach (Property::all() as $item) {
            if ($item['sign']) {
                $this->totalPro += $item['amount'];
                $this->totalInc += $item['amount'];
            } else {
                $this->totalPro -= $item['amount'];
                $this->totalExp += $item['amount'];
            }
        }
        return $this->totalPro;
    }

    public function IndexShow()
    {
        return view('index', [
            'property' => $this->TotalProperty()
        ]);
    }
}
