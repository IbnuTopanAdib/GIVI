@extends('layouts.itemsMaster')
@section('active2', 'active')

@section('itemContent')
@foreach ($categories as $category)
    <div class="col-md-4">

        <a href="categories/{{ $category->id }}" class="card-link">
            <div class="card-category">
                <div class="icon">
                    <img src="{{ asset('storage/' . $category->category_image) }}" alt="" height="38px"
                        width="38px">
                </div>
                <p class="title">{{ $category->category_name }}</p>
                <p class="text">{{ $category->category_description }}</p>
            </div>
        </a>
    </div>
@endforeach
@endsection