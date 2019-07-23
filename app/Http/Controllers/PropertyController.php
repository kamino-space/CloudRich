<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use Auth;

class PropertyController extends Controller
{
    private $listShow;
    private $pageCount;
    private $pageCurrent;

    public function TotleProperty()
    {
        $totle = 0;
        foreach (Property::all() as $item) {
            $totle = $item['sign'] ? $totle + $item['amount'] : $totle - $item['amount'];
        }
        return $totle;
    }

    private function PropretyListAll()
    {
        $list = [];
        foreach (Property::orderBy('id', 'DESC')->get() as $item) {
            $list[] = [
                'id' => $item['id'],
                'sign' => $item['sign'] ? '+' : '-',
                'amount' => $item['amount'],
                'mark' => $item['mark'],
                'time' => date('Y-m-d H:i:s', strtotime($item['created_at']))
            ];
        }
        $this->listShow = $list;
        $this->pageCount = 1;
        $this->pageCurrent = 1;
        return $list;
    }

    private function PropretyListByPage($page)
    {
        $list = [];
        $all = $this->PropretyListAll();
        return $list;
    }

    public function AdminPanel(Request $request, $page = 1)
    {
        $page == 'all' ? $this->PropretyListAll() : $this->PropretyListByPage($page);
        return view('admin.detail', [
            'listShow' => $this->listShow,
            'pageCount' => $this->pageCount,
            'pageCurrent' => $this->pageCurrent
        ]);
    }
}
