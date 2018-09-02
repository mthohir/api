@extends('layouts.app')

@section('content')
<div class="container">
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
   
    <div class="row">
       <a href="{{url('/create/crud')}}" class="btn btn-success">Create Crud</a>
       <a href="{{url('/crud')}}" class="btn btn-default">All Cruds</a>
    </div>
</div>
@endsection