@extends('layouts.app')

@section('content')
<div class="admin-box">
    @component('admin.add')
    @endcomponent
    <ul>
        <li>资产：{{$all}}</li>
        <li>收入：{{$income}}</li>
        <li>支出：{{$all}}</li>
    </ul>
</div>
@endsection