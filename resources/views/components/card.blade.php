<div class="card h-100 mb-3">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $text }}</p>
        @if(isset($buttonUrl) && isset($buttonText))
            <a href="{{ $buttonUrl }}" class="btn btn-primary">{{ $buttonText }}</a>
        @endif
    </div>
</div>
