    @foreach ($moreposts as $post)
        <div class="mb-4 mx-3 d-flex align-items-center fontsizee">
            <a href="{{url('/blog/'.$post->id)}}" class="d-flex">
            <img class="roundimg" src="/storage/{{$post->image}}" height="100" width="100" alt="1">
                <div class="ms-2 px-2 d-flex flex-column justify-content-center">
                    <span class="mb-1 overflow-hidden noflow"> {{$post->title}} </span>
                    <span style="font-family: cursive;">
                        <span class="fas fa-user"></span>
                        {{$post->author}}
                        <br>
                        <span class="fas fa-calendar-alt"></span>
                        {{ \Carbon\Carbon::parse($post->date)->format('d-M-Y') }}
                    </span>
                </div>
            </a>
        </div>
    @endforeach
