@extends('layouts.admin')

@section('admin_icon', 'lightbulb')

@section('admin_title', 'Email Resources')

@section('admin_breadcrumb')
<ul class='breadcrumb'>
    <li>
        <a href="{{ AdminURL::route('email.something') }}"><i class='icon-lightbulb'> </i>Email Resource</a>
    </li>
</ul>
@stop

@section('admin_content')
{{ trans('email::admin.hello') }}
@stop