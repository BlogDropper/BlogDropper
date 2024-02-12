    @foreach ($moreposts as $p)
        <div>
            <a href="{{url('blog/'.$p->id)}}">
                <h2 class="post-title">{{$p->title}}</h2>
                <h2 class="post-subtitle">{{$p->description}}</h2>
            </a>
            <p>
                <span class="mx-1"></span>
                <span class="fas fa-user"></span>
                <span style="font-family: cursive;">{{$p->author}}</span>
                <span class="mx-2"></span>
                <span class="fas fa-calendar-alt"></span>
                <span style="font-family: cursive;">
                {{ \Carbon\Carbon::parse($p->date)->format('d-M-Y') }}
                </span>
            </p>
        </div>
        <hr class="my-4"/>
    @endforeach
