<div class="side-menu">
    <div>
        <h1 class="brand-name">VEDA</h1>
    </div>
    <ul>
        @foreach ($sidebar as $value => $key) :
            @foreach ($key as $value => $url) : ?>
                <a href="{{route($url)}}">
                    <span class="title span"><?= $value ?></span>
                </a>
            @endforeach
        @endforeach
    </ul>
</div>
