@extends('layouts.app')

@section('content')
<div class="admin-box">
    <div class="admin-quickadd">
        @component('admin.add')
        @endcomponent
    </div>
    <div class="admin-list">
        <table class="layui-table" id="plist" lay-filter="plist">
            <thead>
                <tr>
                    <th>编号</th>
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
                    <td>
                        <button type="button" class="layui-btn" onclick="edititem({{$li['id']}})">
                            <i class="layui-icon">&#xe642;</i>
                        </button>
                        <button type="button" class="layui-btn" onclick="delitem({{$li['id']}})">
                            <i class="layui-icon">&#xe640;</i>
                        </button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="pages-ctrl">
        <div id="pages"></div>
    </div>
    <form action="" id="delform" method="POST">
        @csrf
        <input type="hidden" name="action" value="del">
    </form>
    <form action="" id="editform" method="POST">
        @csrf
        <input type="hidden" name="action" value="del">
    </form>
</div>

<script>
    layui.use(['laypage', 'layer'], function() {
        let laypage = layui.laypage;
        let layer = layui.layer;

        laypage.render({
            elem: 'pages',
            count: '{{$listCount}}',
            limit: '{{$listCount / $pageCount}}',
            curr: '{{$pageCurrent}}',
            jump: function(obj, first) {
                if (!first) {
                    window.location.href = "{{ url('/admin/detial') }}/" + obj.curr
                }
            }
        });

        @if(!empty($Message))
            layer.alert("{{$Message}}")
        @endif

    });

    function delitem(id) {
        layer.alert("确定删除编号为" + id + "的数据吗", {
            btn: ['确定', '取消'],
            yes: function() {
                const df = $("#delform");
                const di = $("<input type='hidden' name='id' value='" + id + "'>");
                df.append(di);
                df.submit();
            }
        });

    }

    function edititem(id) {
        layer.open({
            type: 1,
            title: "修改数据",
            closeBtn: 1,
            shadeClose: true,
            skin: "editstyle",
            content: "TODO"
        })
    }
</script>

@endsection