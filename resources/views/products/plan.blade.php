@extends('layouts.main')

@push('style')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header bg-blue py-3">
            <div class="float-left">
                <h6 class="m-0 font-weight-bold">Data {{ $title }}</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-8">
                    <form id="form">
                        <input type="number" name="product_amount" id="product_amount"
                            placeholder="Masukkan Jumlah Mobil yang ingin diproduksi" class="form-control">
                    </form>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-primary" onclick="calculate()">Kalkulasi</button>
                </div>
            </div>
            <div class="row mb-3">
                <span class="fw-bold">Waktu yang dibutuhkan : <span id="time_required"></span></span>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width:15%;">#</th>
                            <th>Product Name</th>
                            <th>Material Name</th>
                            <th>Material Required</th>
                            <th>Time Required</th>
                            <th>COGS</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script>
        let table = [];
        $(document).ready(function() {
            table = $('#dataTable').DataTable({
                data: [],
                columns: [{
                        data: 'index',
                    },
                    {
                        data: 'product_name',
                    },
                    {
                        data: 'material_name',
                    },
                    {
                        data: 'material_required',
                    },
                    {
                        data: 'time_required',
                    },
                    {
                        data: 'cogs',
                    },
                ],
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        })

        function calculate() {
            const productAmount = $('#product_amount').val();
            $.ajax({
                url: "{{ route('product.plan.calculate') }}",
                method: 'POST',
                data: {
                    data: productAmount
                },
                cache: false,
                success: function(r) {
                    let data = r.data
                    table.clear()
                    table.rows.add(data)
                    table.draw()
                    let html = `${r.production_time} Menit`
                    $('#time_required').html(html)
                },
                error: function(req, status, error) {
                    const statusCode = req.status
                    const message = error
                }
            })
        }
    </script>
@endpush
