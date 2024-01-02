<!-- Topbar Start -->
<div class="container-fluid px-5 d-none d-lg-block">
    <div class="row gx-5">
        @foreach ($topbarInfos as $info)
            <div class="col-lg-4 text-center py-3">
                <div class="d-inline-flex align-items-center">
                    <img class="topbar-icon" src="/storage/{{ $info->icon }}" />
                    <div class="text-start">
                        <p class="text-uppercase fw-bold">{{ $info->title }}</p>
                        <span>
                            @if ($info->url !== null)
                                <a href="{{ $info->url }}">
                            @endif
                            {{ $info->value }}
                            @if ($info->url !== null)
                                </a>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Topbar End -->
