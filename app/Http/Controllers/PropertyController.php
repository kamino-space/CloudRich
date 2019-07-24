<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use Auth;

class PropertyController extends Controller
{
    private $listShow;
    private $listCount;
    private $pageCount;
    private $pageCurrent;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function TotleProperty()
    {
        $totle = 0;
        foreach (Property::all() as $item) {
            $totle = $item['sign'] ? $totle + $item['amount'] : $totle - $item['amount'];
        }
        return $totle;
    }

    private function GetAll($orderby = 'id', $desc = true)
    {
        $list = [];
        foreach (Property::orderBy($orderby, $desc ? 'DESC' : 'ASC')->get() as $item) {
            $list[] = [
                'id' => $item['id'],
                'sign' => $item['sign'] ? '+' : '-',
                'amount' => $item['amount'],
                'mark' => $item['mark'],
                'time' => date('Y-m-d H:i:s', strtotime($item['created_at']))
            ];
        }
        $this->listCount = count($list);
        return $list;
    }

    private function PropretyListAll()
    {
        $list = $this->GetAll();
        $this->listShow = $list;
        $this->pageCount = 1;
        $this->pageCurrent = 1;
        return $list;
    }

    private function PropretyListByPage($page)
    {
        $all = $this->GetAll();
        $list = [];
        $pages  = $this->listCount / 10;
        for ($i = 0; $i < $pages; $i++) {
            $list[$i] = array_slice($all, 10 * $i, 10);
        }
        $this->listShow = $list[$page - 1];
        $this->pageCount = $pages;
        $this->pageCurrent = $page;
        return $list;
    }

    public function PropretyList(Request $request, $page = 1)
    {
        $page == 'all' ? $this->PropretyListAll() : $this->PropretyListByPage($page);
        return view('admin.detail', [
            'listShow' => $this->listShow,
            'listCount' => $this->listCount,
            'pageCount' => $this->pageCount,
            'pageCurrent' => $this->pageCurrent
        ]);
    }

    public function PropertyAdd(Request $request)
    { }

    public function PropertyDelete(Request $request)
    { }

    public function PropertyEdit(Request $request)
    { }

    public function AdminPanel()
    {
        return view('admin.overview');
    }
}
