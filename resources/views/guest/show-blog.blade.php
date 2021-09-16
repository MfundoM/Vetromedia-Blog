@extends('layouts.app')

@push('scripts')
    <script async crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=175979194667871&autoLogAppEvents=1" nonce="FUrisRrl"></script>
@endpush

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-8">
            <h1 class="text-4xl">
                {{ $post->title }}
            </h1>
        </div>
    </div>

    <div class="w-4/5 m-auto pt-0">
        <span class="text-gray-500">
            By <span class="font-bold italic text-red-700">{{ $post->user->name }}</span>, {{ date('jS M Y', strtotime($post->created_at)) }}
        </span>

        <img class="pt-3" width="693" height="434" src="{{ strpos($post->image_path, 'http') === 0 ? $post->image_path : asset('storage/posts/'.$post->image_path) }}" alt="">

        <p class="text-xl text-gray-700 pt-4 pb-10 leading-8 font-light">
            {{ $post->content }}
        </p>
        <p>
            <div class="fb-like" data-href="http://vetromedia-blog.test/blog/{{ $post->slug }}" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
        </p>
        <p>
            <div class="fb-comments" data-href="http://vetromedia-blog.test/blog/{{ $post->slug }}" data-width="1000" data-numposts="5"></div>
        </p>
    </div>
@endsection
