@extends('layouts.main')

@push('style')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-blue py-3">
                    <div class="float-left">
                        <h6 class="m-0 font-weight-bold">Tambah {{ $title }}</h6>
                    </div>
                </div>
                <form action="{{ route('product.materials.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="form-group mb-3">
                            <label class="form-label">Nama Produk</label>
                            <select name="product_id" class="form-control">
                                <option selected disabled>--Pilih Produk--</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Nama Material</label>
                            <select name="material_id" class="form-control">
                                <option selected disabled>--Pilih Material--</option>
                                @foreach ($materials as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('material_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Qty</label>
                            <input type="number" name="qty" placeholder="Masukkan Qty" class="form-control">
                            @error('qty')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
