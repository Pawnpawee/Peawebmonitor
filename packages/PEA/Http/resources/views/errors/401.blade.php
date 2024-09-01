@extends('http::layouts.error')

@section('code', '401')

@section('title', __('Unauthorized'))

@section('message', __('Sorry, you don\'t have permission to access the resouece.'))
