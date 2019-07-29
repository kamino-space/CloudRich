<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use Auth;
use Mockery\CountValidator\Exception;

class PropertyController extends Controller
{
    private $listShow;
    private $listCount;
    private $pageCount;
    private $pageCurrent;
    private $totalPro = 0;
    private $totalInc = 0;
    private $totalExp = 0;

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function TotalIncome()
    {
        return $this->totalInc;
    }

    public function TotalExpend()
    {
        return $this->totalExp;
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
                'time' => date('Y-m-d H:i:s', strtotime($item['time']))
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
        if(count($all) == 0){
            return [];
        }
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

    public function PropretyList(Request $request, $page = 1, $msg = null)
    {
        $page == 'all' ? $this->PropretyListAll() : $this->PropretyListByPage($page);
        return view('admin.detail', [
            'listShow' => $this->listShow,
            'listCount' => $this->listCount,
            'pageCount' => $this->pageCount,
            'pageCurrent' => $this->pageCurrent,
            'Message' => $msg
        ]);
    }

    public function PropertyCtrl(Request $request, $page = 1)
    {
        try {
            switch ($request->post('action')) {
                case 'add':
                    $this->PropertyAdd([
                        'user' => Auth::user()->id,
                        'sign' => $request->post('sign'),
                        'amount' => $request->post('amount'),
                        'mark' => $request->post('mark'),
                        'time' => $request->post('time')
                    ]);
                    $msg = "添加成功";
                    break;
                case 'del':
                    $this->PropertyDelete([
                        $request->post('id')
                    ]);
                    $msg = "删除成功";
                    break;
                default:
                    $msg = "非法请求";
                    break;
            }
            return $this->PropretyList($request, 1, $msg); //TODO: URL页码显示错误
        } catch (Exception $e) {
            return $this->PropretyList($request, $page, "错误：" + $e->getMessage());
        }
    }

    private function PropertyAdd($item)
    {
        Property::create($item);
    }

    private function PropertyDelete($item)
    {
        Property::destroy($item);
    }

    private function PropertyEdit($item)
    { }

    public function AdminPanel(Request $request)
    {
        return view('admin.overview', [
            'all' => $this->TotalProperty(),
            'income' => $this->TotalIncome(),
            'expend' => $request->getRequestUri()
        ]);
    }
}
