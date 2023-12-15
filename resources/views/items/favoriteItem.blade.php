@extends('layouts.itemsMaster')
@section('active3', 'active')
@section('itemContent')
    @if ($favoriteItems->count())
        <div class="container">
            <div class="row">
                @foreach ($favoriteItems as $item)
                    <div class="col-md-3">
                        <div class="card-barang">
                            <div class="image-container">
                                <img src="{{ asset('./storage/' . $item->image) }}" alt="">
                            </div>
                            <div class="favorite">
                                <form id="deleteFavoritForm" method="POST"
                                    action="/item/{{ $item->id }}/favorite/delete">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" id="deleteFavoritButton"><i
                                            class="bi bi-heart-fill"></i></button>
                                </form>


                            </div>

                            <div class="content">
                                <div class="category">

                                    <a href="/items?category={{ $item->category->category_name }}"
                                        class="text-decoration-none">{{ $item->category->category_name }}
                                    </a>
                                </div>
                                <div class="item-name">{{ $item->name }}</div>
                                <div class="description">
                                    {{ $item->description }}
                                </div>
                                <div class="donator">
                                    By. <a href="/items?user={{ $item->user->username }}">{{ $item->user->name }}</a>
                                </div>
                                <div class="location">location: {{ $item->location }}</div>
                            </div>

                            <div class="button-container">
                                <a href="/items/{{ $item->id }}" class="readmore button text-center">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">Barang tidak ditemukan</p>
    @endif


@endsection
