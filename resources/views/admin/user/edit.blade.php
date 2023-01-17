@extends('adminlte::page')

@section('title', 'Informacion')
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/dataTables.responsive.css">
    <link rel="shortcut icon" href="{{ asset('icon/favicon.ico') }}">
@stop

@section('content_header')
    
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>User</h1>
                </div>
            </div>
        </div>
   </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

           {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('users.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

       </div>
    </div>
@endsection