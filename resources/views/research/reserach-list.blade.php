@extends('template.landing-template')

@section('page-header')

    @include('components.page-header', [
            'header' => 'โครงการวิจัย',
            'sub_header' => 'ของคณะวิทยาศาสตร์และเทคโนโลยี'
            ] )

@endsection

@section('content')

    @include('components.research.project-list')

@endsection