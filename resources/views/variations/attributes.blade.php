@extends('layouts.app')

@section('title')
Variation Attributes
@endsection

@section('content')

<div class='row m-b-1'>
    <div class='col-sm-3'>
        <a href='{{ url('variations/attributes/create') }}'><button type='button' id='createAttributeBtn' class='btn btn-block btn-success'>Create Attribute</button></a>
    </div>
</div>

<div class='row'>
    <div class='col-sm-12'>
        <table id="attributesTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        Title
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($attributes as $attribute)
                <tr class="dataTableRow" data-id="{{ $attribute->id }}">
                    <td>{{ $attribute->title }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')

<script type="text/javascript">
$('#attributesTable').DataTable({searching: false, paging: false});

$('.dataTableRow').bind('click', function () {
    window.location.replace('attributes/' + $(this).data('id'));
});
</script>

@endpush
