<div class="flex-center" style="{{ $justifyStyle }}">
    <div class="outer-star" >
        <i class="fas fa-star" aria-hidden="true"></i>
        <i class="fas fa-star" aria-hidden="true"></i>
        <i class="fas fa-star" aria-hidden="true"></i>
        <i class="fas fa-star" aria-hidden="true"></i>
        <i class="fas fa-star" aria-hidden="true"></i>
        <span class="inner-star" style="width: {{ $rating * 20 }}%">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </span>
    </div>
    <div class="flex-center">
        <p class="m-0 p-0 font-weight-bold">{{ number_format($rating,2) }}</p>
    </div>
</div>