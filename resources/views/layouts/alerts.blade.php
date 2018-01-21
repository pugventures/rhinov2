
@if (session('success'))
<div class="alert alert-success alert-dismissable">
    {{ session('success') }}
</div>
@endif


@if (session('info'))
<div class="alert alert-info alert-dismissable">
    {{ session('info') }}
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning alert-dismissable">
    {{ session('warning') }}
</div>
@endif

@if (session('danger'))
<div class="alert alert-danger alert-dismissable">
    {{ session('danger') }}
</div>
@endif
