<div class="row">
@foreach ($moreposts as $p)
    <div class="col-sm-6" data-aos="slide-up">
        <a href="{{ url('blog/title/' . $p->slug) }}">
        <div class="blog-grid">
            <div class="blog-img">
                <div class="date">
                    <span>{{ \Carbon\Carbon::parse($p->date)->format('d') }}</span>
                    <label>{{ \Carbon\Carbon::parse($p->date)->format('M') }}</label>
                </div>
                    <img src="{{ asset('storage/' . $p->banner) }}" class="fixed-image" alt="{{ $p->title }}">
            </div>
            <div class="blog-info">
                <h5>{{ $p->title }}</h5>
                <p>{{ $p->description }}</p>
                <br>
                <p style="display: flex; align-items: center;">
                    <span style="font-family: cursive; margin-right: 10px;">
                        <i class="fas fa-user"></i> {{$p->author}}
                    </span>
                    <span>
                        @foreach ($p->categories as $category)
                            <i class="fas fa-coffee"></i> {{ $category->name }}
                        @endforeach
                    </span>
                </p>
            </div>
        </div>
        </a>
    </div>
@endforeach
</div>
