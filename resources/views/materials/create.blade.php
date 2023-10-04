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
                <form action="{{ route('materials.store') }}" method="post">
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
                            <label class="form-label">Nama Material</label>
                            <input type="text" name="name" placeholder="Masukkan Nama Material" class="form-control">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stock" placeholder="Masukkan Stok" class="form-control">
                            @error('stock')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="price" placeholder="Nama Harga Material" class="form-control">
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Waktu yang dibutuhkan untuk merakit(dalam menit)</label>
                            <input type="number" name="time_required" placeholder="Waktu yang dibutuhkan"
                                class="form-control">
                            @error('time_required')
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
