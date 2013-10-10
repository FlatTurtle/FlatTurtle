<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $flatturtle->title }}</title>
    <link href="{{ URL::asset('css/common.css') }}" rel="stylesheet">

    <style>
    .colorful, .btn-special {
        background-color: {{ $flatturtle->color }};
    }

    #jumbo {
        border-top: 5px solid {{ $flatturtle->color }};
    }

    h1, a, a:hover, .carousel-control:hover {
        color: {{ $flatturtle->color }};
    }
    </style>
</head>
<body>


    <section id="jumbo" class="carousel slide">
        <ol class="carousel-indicators">
        @foreach ($images as $i => $image)
            @if ($i == 0)
                <li data-target="#jumbo" data-slide-to="{{ $i }}" class="active"></li>
            @else
                <li data-target="#jumbo" data-slide-to="{{ $i }}"></li>
            @endif
        @endforeach
        </ol>

        <div class="carousel-inner">
            @foreach ($images as $i => $image)
                @if ($i == 0)
                    <div class="item active" style="background-image: url('{{ $image }}')">
                        <div class="carousel-caption"></div>
                    </div>
                @else
                    <div class="item" style="background-image: url('{{ $image }}')">
                        <div class="carousel-caption"></div>
                    </div>
                @endif
            @endforeach
        </div>

        <a class="left carousel-control" href="#jumbo" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#jumbo" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </section>



    <nav class="colorful">
        <ul>
        @foreach ($blocks as $block)
            @if ($block->title)
            <li>
                <a href="#{{ $block->id }}">{{ $block->title }}</a>
            </li>
            @endif
        @endforeach
            <li>
                <a href="#newsletter">Newsletter</a>
            </li>
        </ul>
    </nav>



    <section id="content">
    @foreach ($blocks as $block)

    <div class="block">
        <div id="{{ $block->id }}" class="container">
            {{ $block->html }}
        </div>
    </div>

    @endforeach
    </section>



    @if (Config::has('flatturtle.mailchimp'))
    <section id="newsletter" class="block colorful">
        <div class="container">
            <h1>Newsletter</h1>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean mauris tellus, sollicitudin id libero vitae, pellentesque fringilla nisl.</p>

            <form class="form-inline" method="POST" action="{{ Config::get('flatturtle.mailchimp') }}" role="form">
                <div id="mailbox">
                    <div class="input-group">
                        <input type="email" name="EMAIL" class="form-control">
                        <span class="input-group-addon">
                            <button type="submit" class="btn btn-special">Sign Up</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @endif



    <section id="map">
        <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            src="https://maps.google.ro/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $flatturtle->latitude }},{{ $flatturtle->longitude }}&amp;z={{ $flatturtle->zoom }}&amp;iwloc=A&amp;output=embed&amp;iwloc=nea"
        ></iframe>
    </section>



    <script src="{{ URL::asset('javascript/jquery.js') }}"></script>
    <script src="{{ URL::asset('javascript/carousel.js') }}"></script>

</body>
</html>
