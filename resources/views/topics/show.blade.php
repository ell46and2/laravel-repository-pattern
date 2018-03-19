<h3>{{ $topic->title }} <small>{{ $topic->created_at->diffForHumans() }}</small></h3>

@foreach ($topic->posts as $post)
    <p>{{ $post->body }} - {{ $post->user->name }}</p>
@endforeach
