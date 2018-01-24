@extends('layouts.app')

@section('title')
Products
@endsection

@section('content')

<div class='row m-b-1'>
    <div class='col-sm-3'>
        <a href='{{ url('products/create') }}'><button type='button' id='createProductBtn' class='btn btn-block btn-success'>Create Product</button></a>
    </div>
</div>

<div class='row'>
    <div class='col-sm-12'>
        <table id="productsTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        Title
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="productRow" data-id="{{ $product->id }}">
                    <td>{{ $product->title }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


@push('styles')

<style>
    .productRow {
        cursor:pointer;
    }
</style>

@endpush

@push('scripts')

<script src="{{ asset('vendor/summernote/dist/summernote.js') }}"></script>
<script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendor/datatables/media/js/dataTables.bootstrap4.js') }}"></script>

<script type="text/javascript">
$('.summernote').summernote();
$('#productsTable').DataTable({searching: false, paging: false});

$('.productRow').bind('click', function () {
    window.location.replace('products/' + $(this).data('id'));
});
</script>

@endpush
