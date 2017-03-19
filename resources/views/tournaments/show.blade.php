{{ $tournament->title }}
{{ $tournament->description }}
{{ $tournament->venue }}

{{ $tournament->starts_at->format('l jS F Y') }}
{{ $tournament->ends_at->format('l jS F Y') }}

{{ $tournament->starts_at->format('ga') }}
{{ $tournament->ends_at->format('ga') }}