@foreach ($topics as $topic)
    <h3>{{ $topic->title }} <small>{{ $topic->created_at->diffForHumans() }}</small></h3>
@endforeach
