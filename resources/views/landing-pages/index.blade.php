@extends('landing-pages.layouts.main')

@section('content')
    @include('landing-pages.sections.hero')
    @include('landing-pages.sections.about')
    @include('landing-pages.sections.features')
    @include('landing-pages.sections.action')
    @include('landing-pages.sections.services')
@endsection
