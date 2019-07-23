@extends('layouts.app')

@section('content')
<div class="admin-box">
    <div class="admin-quickadd">

    </div>
    <div class="admin-list">
        <table class="layui-table" id="plist" lay-filter="plist">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>收支</th>
                    <th>金额</th>
                    <th>备注</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listShow as $li)
                <tr style="background-color:{{$li['sign']=='+'?'#99ec99':'#f9acac'}}">
                    <td>{{$li["id"]}}</td>
                    <td>{{$li["sign"]}}</td>
                    <td>{{$li["amount"]}}</td>
                    <td>{{$li["mark"]}}</td>
                    <td>{{$li["time"]}}</td>
                    <td>Action</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
</script>
@endsection