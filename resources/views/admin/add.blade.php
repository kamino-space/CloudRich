<div class="quick-add-box">
    <div class="layui-collapse">
        <div class="layui-colla-item">
            <h2 class="layui-colla-title">快速添加</h2>
            <div class="layui-colla-content">
                <form class="layui-form" action="" method="POST">
                    @csrf
                    <input type="hidden" value="add" name="action">
                    <div class="layui-form-item">
                        <label class="layui-form-label">收支</label>
                        <div class="layui-input-block">
                            <select name="sign" lay-verify="required">
                                <option value="1">收入</option>
                                <option value="0">支出</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">金额</label>
                        <div class="layui-input-block">
                            <input type="number" name="amount" required lay-verify="required" placeholder="100" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">时间</label>
                        <div class="layui-input-block">
                            <input id="timeinput" type="text" name="time" required lay-verify="required" placeholder="{{date('Y-m-d H:i:s')}}" value="{{date('Y-m-d H:i:s')}}" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">备注</label>
                        <div class="layui-input-block">
                            <input type="text" name="mark" require lay-verify="required" placeholder="请输入备注" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    layui.use(['form', 'laydate', 'element'], function() {
        let form = layui.form;
        let laydate = layui.laydate;
        let element = layui.element;

        laydate.render({
            elem: '#timeinput',
            type: 'datetime'
        });
    })
</script>