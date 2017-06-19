@extends('template.landing-template')

@section('page-header')

    @include('components.page-header', [
            'header' => 'ผลงานวิชาการ',
            'sub_header' => 'ของคณะวิทยาศาสตร์และเทคโนโลยี'
            ] )

@endsection

@section('content')

    @include('research.journal.journal-list',['journals'=> $journals])

@endsection