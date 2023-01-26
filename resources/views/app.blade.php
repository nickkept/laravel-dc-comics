@extends('layout.main')

<h2 class="text-center">Homepage</h2>

<div class="text-center">
    <a href="{{ route('comics.create')}}" class="btn btn-link">Create</a>
    <a href="{{ route('comics.index')}}" class="btn btn-link">Index</a>
</div>