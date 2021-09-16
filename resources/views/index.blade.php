@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-8 border-b border-gray-200">
            <h1 class="text-6xl">Blogs</h1>
        </div>
    </div>

    @if (empty($posts))
        <div class="w-4/5 bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 text-center" role="alert">
            <p class="font-bold">There are no blog posts available.</p>
        </div>
    @else
        @foreach($posts as $post)
            <div class="sm:grid grid-cols-2 gap-10 w-4/5 mx-auto py-8 border-b border-gray-200">
                <div>
                    <img src="{{ strpos($post->image_path, 'http') === 0 ? $post->image_path : asset('storage/posts/'.$post->image_path) }}" alt="" >
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-700 pb-4">
                        {{ $post->title }}
                    </h2>
                    <span class="text-gray-500">
                By
                <span class="font-bold italic text-red-700">
                    {{ $post->user->name }}
                </span>, {{ date('jS M Y', strtotime($post->created_at)) }}
            </span>
                    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                        {{ blurb($post->content) }}
                    </P>
                    <a href="{{ route('blog', ['slug' => $post->slug]) }}" class="uppercase bg-blue-500 text-gray-100 text-xm font-extrabold py-4 px-8 rounded-3xl">
                        Read More...
                    </a>
                </div>
            </div>
        @endforeach
        <div class="w-4/5 m-auto text-center pt-2">
            <div>{{ $posts->links() }}</div>
        </div>
    @endif
@endsection
