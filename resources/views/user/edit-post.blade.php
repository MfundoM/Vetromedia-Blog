@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-8">
            <h1 class="text-3xl">
                Edit Post
            </h1>
        </div>
    </div>

    <div class="w-4/5 m-auto">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border border-gray-400 sm:rounded-lg p-8">
                        @if (session()->has('message'))
                            <div class="bg-green-400 border-t border-b border-green-500 text-green-700 px-4 py-3 text-center" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="bg-red-400 border-t border-b border-red-500 text-red-700 px-4 py-3 text-center" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-center">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="py-5">
                                <input type="text" name="title" class="w-full form-input" value="{{ $post->title }}">
                            </div>

                            <div class="py-5">
                                <textarea name="content" placeholder="Description..." rows="5" class="form-textarea w-full">{{ $post->content }}</textarea>
                            </div>

                            <div class="bg-grey-lighter pt-5">
                                <input type="file" name="image_path">
                            </div>

                            <div class="mt-5">
                                <button
                                    type="submit"
                                    class="uppercase float-right bg-green-400 text-gray-100 text-lg font-bold py-4 px-8 rounded-2xl">
                                    Edit Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
