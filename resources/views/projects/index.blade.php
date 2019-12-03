<html>
    <head>

    </head>
<body>
    <h1>Birdboard</h1>
    <ul>
        @forelse($projects as $project)
            <li>
                <a href="{{ $project->path() }}">{{ $project->title }}</a>
            </li>
        @empty
            <li>No projects</li>
        @endforelse
    </ul>
</body>
</html>
