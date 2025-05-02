@extends('partials.layout')
@section('content')
<div class="container mx-auto px-4 py-6">
  <div class="flex justify-center mb-4">
    {{ $posts->links() }}
  </div>

  @if(isset($tag))
    <h1 class="text-3xl font-bold mb-6">
      Posts tagged “{{ $tag->name }}”
    </h1>
  @endif

  @if($posts->isEmpty())
    <p class="text-center text-gray-600">No posts found.</p>
  @else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach($posts as $post)
        <div class="card bg-base-100 shadow-md overflow-hidden">
          @if($post->image)
            <figure>
              <img src="{{ $post->image }}" alt="{{ $post->title }}" />
            </figure>
          @endif

          <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p>{{ $post->snippet }}</p>

            <div class="flex justify-between items-center text-sm text-gray-500 mb-2">
              <span>{{ $post->created_at->diffForHumans() }}</span>
              @if($post->updated_at->gt($post->created_at))
                <span>Edited</span>
              @endif
            </div>

            <div class="text-xs text-neutral-content mb-2">
              <a href="{{ route('user', $post->user) }}" class="link">{{ $post->user->name }}</a>
              ·
              <a href="{{ route('category', $post->category) }}" class="link">{{ $post->category->name }}</a>
            </div>

            <div class="flex items-center gap-2 mb-2">
              <form action="{{ route('like', $post) }}" method="POST">
                @csrf
                <button type="submit"
                        class="btn btn-sm {{ $post->authHasLiked ? 'btn-secondary' : 'btn-primary' }}">
                  {{ $post->authHasLiked ? 'Unlike' : 'Like' }} ({{ $post->likes_count }})
                </button>
              </form>
              <span class="text-sm">Comments: {{ $post->comments_count }}</span>
            </div>
            @if($post->tags->isNotEmpty())
              <div class="flex flex-wrap gap-1 mb-4">
                @foreach($post->tags as $tagItem)
                  <a href="{{ route('tags.show', $tagItem) }}"
                        class="btn btn-xs btn-outline btn-primary capitalize">
                    {{ $tagItem->name }}
                  </a>
                @endforeach
              </div>
            @endif
            <div class="card-actions justify-end">
              <a href="{{ route('post', $post) }}" class="btn btn-sm btn-primary">
                Read More
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
  <div class="flex justify-center mt-6">
    {{ $posts->links() }}
  </div>
</div>
@endsection
