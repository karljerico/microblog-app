<div class="container">
    @foreach ($posts as $post)
        <div class="card mb-2 mx-auto" style="background-color: #FAF9F6; border: 2px solid #FFA903; width: 55rem;">
            <div class="card-header d-flex justify-content-end" style="background-color: #FFA903">
                @if($post->user_id === auth()->id())
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-light btn-sm" style="margin-right:10px; height: 30px;">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-light btn-sm delete-button" style="margin-right:10px; height: 30px;" data-post-id="{{ $post->id }}">Delete</button>
                    </form>
                @endif
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-light btn-sm" style="margin-right:10px; height: 30px;">View</a>
            </div>
            <div class="card-body">
                @if (auth()->check() && $post->user->id === auth()->user()->id)
                    <a class="card-title text-dark text-decoration-none h3" href="{{ route('profile.show') }}">{{ $post->user->name }}</a>
                @else
                    <a class="card-title text-dark text-decoration-none h3" href="{{ route('profile.index', $post->user) }}">{{ $post->user->name }}</a>
                @endif
                <p class="text-secondary small text-xs opacity-75">
                    <i>{{ $post->updated_at->setTimezone('Asia/Manila')->format('j M Y \a\t g:ia') }}</i>
                </p>
                <p class="card-text" style="font-size: 20px;">{{ $post->content }}</p>
                @if ($post->image)
                    <img height="250px" width="150px" src="{{ asset('/storage/images/'.$post->image) }}" alt="Post Image" class="img-fluid">
                @endif
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div class="interaction mt-1">
                    <button class="btn btn-sm btn-primary like-button" data-post-id="{{ $post->id }}">
                        @if ($post->isLikedBy(auth()->user()))
                            Unlike
                        @else
                            Like
                        @endif
                    </button>
                    <a href="{{ route('comments.index', $post->id) }}" class="btn btn-sm btn-success comment">Comment</a>
                </div>
                <div>
                    <a href="#" class="btn btn-sm btn-danger share">Share</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
