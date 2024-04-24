@extends('client.layouts.app')

@section('title', 'Tin tức')

@section('content')
    <div class="news_1">
        <h1>TIN TỨC</h1>
    </div>
    <div class="news_2">
        <div class="news_2-left">
            @foreach ($news as $item)
                <a class="news_2-left-item new" href="{{ route('client.news_detail', $item->id) }}" title="{{ $item->title }}" >
                    <div class="news_date-created">
                        <p>{{ $item->created_at->format('d') }}</p> <p>th{{ $item->created_at->format('m') }}</p>
                    </div>
                    <img src="{{ $item->img1 }}" alt="">
                    <div class="news_2-left-item-title">{{ $item->title }}</div>
                    <div class="divider" style="margin-left: 16px;"></div>
                    <div class="news_2-left-item-content">{!! $item->content !!}</div>
                </a>
            @endforeach
        </div>
        <div class="news_2-right">
            <h2>BÀI VIẾT MỚI</h2>
            <div class="divider"></div>
            <div class="news_2-right-list">
                @foreach ($newsDesc as $item)
                    <a href="{{ route('client.news_detail', $item->id) }}" class="news_2-right-item" title="{{ $item->title }}">
                        <img src="{{ $item->img1 }}" alt="">
                        <span>{{ $item->title }}</span>
                    </a>
                @endforeach
            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const intro_imgs = document.querySelectorAll('.new');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('smallToBig');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });

            intro_imgs.forEach(intro_img => {
                observer.observe(intro_img);
            });
        });
    </script>
@endsection
