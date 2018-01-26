@extends('layouts.app')

@section('title')
Variation Options
@endsection

@section('content')

<div class='row m-b-1'>
    <div class='col-sm-3'>
        <a href='{{ url('variations/options/create') }}'><button type='button' id='createBtn' class='btn btn-block btn-success'>Create Option</button></a>
    </div>
</div>

<div class='row'>
    <div class='col-sm-12'>
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        Parent Attribute
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Swatch
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($options as $option)
                <tr class="dataTableRow" data-id="{{ $option->id }}">
                    <td>{{ ucwords($option->attribute->title) }}</td>
                    <td>{{ $option->title }}</td>
                    <td>{{ $option->swatch }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')

<script type="text/javascript">
$('#dataTable').DataTable({searching: false, paging: false});

$('.dataTableRow').bind('click', function () {
    window.location.replace('options/' + $(this).data('id'));
});
</script>

@endpush
