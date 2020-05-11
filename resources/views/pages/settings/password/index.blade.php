@extends('pages.master')

@section('content')
<div class="container">
    <div class="row">
        @include('pages.settings.menu')
        @include('pages.settings.password.main')
    </div>
</div>
@endsection
