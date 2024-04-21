@extends('client.layouts.app')

@section('title', $news->title)

@section('content')
    <div class="news_1">
        <h1>TIN TỨC</h1>
    </div>
    <div class="news_2" style="flex-direction: column;">
        <div class="news_2-top">
            <div class="news_detail">
                <h3><a href="{{ route('client.news') }}">TIN TỨC</a></h3>
                <h1>{{ $news->title }}</h1>
                <div class="divider"></div>
                <img src="{{ asset($news->img1) }}" alt="">
                <code>{!! $news->content !!}</code>
                @if ($news->img2)
                <img src="{{ asset($news->img2) }}" alt="">
                @endif
                <div class="news_detail-link">
                    <div class="news_detail-link-container">
                        <div class="news_detail-link-item">
                            <a href="">
                                <i class="fa-brands fa-facebook-f"></i>
                                Facebook
                            </a>
                        </div>
                        <div class="news_detail-link-item">
                            <a href="">
                                <i class="fa-brands fa-twitter"></i>
                                Twitter
                            </a>
                        </div>
                        <div class="news_detail-link-item">
                            <a href="">
                                <i class="fa-brands fa-google-plus-g"></i>
                                Google+
                            </a>
                        </div>
                        <div class="news_detail-link-item">
                            <a href="">
                                <i class="fa-brands fa-pinterest-p"></i>
                                Pinterest
                            </a>
                        </div>
                        <div class="news_detail-link-item">
                            <a href="">
                                <i class="fa-brands fa-linkedin-in"></i>
                                linkedln
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news_2-right">
                <h2>BÀI VIẾT MỚI</h2>
                <div class="divider"></div>
                <div class="news_2-right-list">
                    @foreach ($newsDesc as $item)
                        <a href="{{ route('client.news_detail', $item->id) }}" class="news_2-right-item">
                            <img src="{{ asset($item->img1) }}" alt="">
                            <span>{{ $item->title }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="news_2-bot">
            <h1>Bài viết liên quan</h1>
            <div class="divider"></div>
            <div class="news_other">
                @foreach ($other_news as $item)
                <a class="news_other-item" href="{{ route('client.news_detail', $item->id) }}" title="{{ $item->title }}">
                    <div class="news_date-created">
                        <p>{{ $item->created_at->format('d') }}</p> <p>th{{ $item->created_at->format('m') }}</p>
                    </div>
                    <img src="{{ asset($item->img1) }}" alt="">
                    <div class="news_other-item-title">{{ $item->title }}</div>
                    <div class="divider" style="margin-left: 16px;"></div>
                    <div class="news_other-item-content">{{ $item->content }}</div>
                </a>
            @endforeach
            </div>
        </div>
    </div>
@endsection
