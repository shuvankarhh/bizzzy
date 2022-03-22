<div class="row justify-content-between">
    <div class="col text-center ps-4">
        @if (!empty($href))
            <a role="button" class="btn prev-button d-block d-sm-block d-md-none d-lg-none d-xl-none d-xxl-none" href="{{ $href }}">Prev</a>
        @endif
    </div>
    <div class="col text-end">
        @if ($buttonText != 'hide')
            <button onclick="{{ $onClick }}" class="btn btn-bizzzy-success text-nowrap me-3">{{ $buttonText }}</button>
        @endif
    </div>
</div>