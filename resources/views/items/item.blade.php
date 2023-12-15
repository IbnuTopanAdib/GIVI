@extends('layouts.itemsMaster')
@section('active2', 'active')
@section('itemContent')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pratinjau Tawaran Anda</h5>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('./storage/' . $donatedItem->image) }}" alt="Image placeholder" class="card-img">
                </div>
                <div class="col-md-6">
                    <h3>Nama Barang : {{ $donatedItem->name }}</h3>
                    <p class="font-weight-bold">Kategori : {{ $donatedItem->category->category_name }}</p>
                    <p class="font-italic">Deskripsi : {{ $donatedItem->description }}</p>
                    <p class="text-muted">Lokasi: {{ $donatedItem->location }}</p>
                    <form action="{{ route('donations.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="donor_id" value="{{ $donatedItem->user->id }}">
                        <input type="hidden" name="recipient_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="item_id" value="{{ $donatedItem->id }}">
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
