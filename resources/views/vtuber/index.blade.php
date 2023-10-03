
    <h1>Vtuber一覧</h1>
    
    <ul>
        @foreach($vtubers as $vtuber)
            <li>
                <a href="{{ route('vtuber.show', $vtuber->id) }}">
                    {{ $vtuber->name }}
                </a>
            </li>
        @endforeach
    </ul>