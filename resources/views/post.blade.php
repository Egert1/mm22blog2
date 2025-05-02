@extends('partials.layout')
@section('content')
  <div class="card bg-base-100 shadow-xl mb-4">
    <figure>
      <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
           alt="Post image" />
    </figure>
    <div class="card-body">
      <h2 class="card-title">{{ $post->title }}</h2>
      <p>{{ $post->body }}</p>

      <div class="flex justify-between items-center text-sm text-gray-500 mb-2">
        <span>{{ $post->created_at->diffForHumans() }}</span>
        @if($post->updated_at->gt($post->created_at))
          <span>Edited</span>
        @endif
      </div>
      <p class="text-neutral-content mb-4">{{ $post->user->name }}</p>
      @if($post->tags->isNotEmpty())
        <div class="mt-4">
          <h3 class="text-lg font-semibold">Tags:</h3>
          <div class="flex flex-wrap gap-2 mt-2">
            @foreach($post->tags as $tag)
              <a href="{{ route('tags.show', $tag) }}"
                 class="badge badge-primary">
                {{ $tag->name }}
              </a>
            @endforeach
          </div>
        </div>
      @endif
    </div>
  </div>

  <div class="card bg-base-200 shadow-xl mb-4">
    <div class="card-body">
      @auth
        <form action="{{ route('comment', $post) }}" method="POST">
          @csrf
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Comment</span>
            </div>
            <textarea name="body" rows="4"
                      placeholder="Write something cool..."
                      class="textarea textarea-bordered w-full @error('body') textarea-error @enderror">{{ old('body') }}</textarea>
            <div class="label">
              @error('body')
                <span class="label-text-alt text-error">{{ $message }}</span>
              @enderror
            </div>
          </label>
          <input type="submit" class="btn btn-primary mt-2" value="Comment">
        </form>
      @else
        <p>Please <a href="{{ route('login') }}" class="link link-primary">log in</a> to leave a comment.</p>
      @endauth
    </div>
  </div>
  @foreach($post->comments as $comment)
    <div class="card bg-base-200 shadow-xl mb-2">
      <div class="card-body">
        <p>{{ $comment->body }}</p>
        <div class="flex justify-between items-center text-sm text-gray-500 mt-2">
          <span>{{ $comment->created_at->diffForHumans() }}</span>
          @if($comment->updated_at->gt($comment->created_at))
            <span>Edited</span>
          @endif
        </div>
        <p class="text-neutral-content mt-1">{{ $comment->user->name }}</p>
      </div>
    </div>
  @endforeach
@endsection
