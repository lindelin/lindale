<!DOCTYPE html>
<html>

<head>
    <!-- Basics -->
    <meta charset="utf-8">
    <meta name="referrer" content="origin" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Lindelëa">
    <meta name="robots" content="index, follow">
    <!-- Schema.org -->
    <meta itemprop="name" content="Lindalë">
    <meta itemprop="description" content="The Project Manager For Everyone.">

    {{-- facebook meta --}}
    <meta property="og:image" content="{{ asset('/og-image.jpg') }}">
    <meta property="og:image:width" content="1852">
    <meta property="og:image:height" content="970">
    <meta property="og:title" content="Lindalë - The Project Manager For Everyone">
    <meta property="og:description" content="Lindalë is an Open Source software for complex project management. Experience a soujourn transcending elegant features comprehensively designed for a team of any size.">
    <meta property="og:url" content="https://www.lindale.tk">

    {{-- local icon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('/safari-pinned-tab.svg') }}" color="#00184a">
    <meta name="apple-mobile-web-app-title" content="Lindalë">
    <meta name="application-name" content="Lindalë">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-TileImage" content="{{ asset('/mstile-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <title>403 - Lindalë</title>

    <meta name="description" content="The Project Manager For Everyone.">

    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Fira+Sans:300,300italic,400,400italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">

</head>


<body>

<header class="site-header">
    <main class="page-content">
        <div class="home">
            <!-- Homepage feature -->
            <section class="home-feature">
                <header class="page-header no-margin">
                    <div class="mask"></div>
                    <img src="{{ asset('img/top/404.jpg') }}" alt="Home featured image" class="page-hero" />
                    <img src="{{ asset('img/top/404-tn.jpg') }}" alt="Home featured image" class="mobile-hero" />
                    <div class="text-box">
                        <p>The Project Manager For Everyone.</p>

                        <nav class="menu">
                            <a href="/" class="nav-title "><h1>{{ trans('errors.unauthorized') }}</h1></a>

                            <a class="nav-link" href="https://github.com/lindelin/lindale/issues" target="_blank">Issues</a>

                            <a class="nav-link" href="https://github.com/lindelin/lindale" target="_blank">GitHub</a>

                            <a class="nav-link" href="https://github.com/lindelin/lindale-ios" target="_blank">iOS App</a>

                            <a class="nav-link" href="https://jp.lindelin.org/privacy/" target="_blank">Privacy Policy</a>

                            <div class="nav-border"></div>

                        </nav>

                    </div>
                </header>
            </section><!-- End homepage feature -->

            <section>
                <a href="{{ url('/home') }}" title="Let's start now" class="button">Back to home</a>
            </section>
        </div>

    </main>

    <footer class="site-footer">

        <div class="wrapper">

            <!-- Social profiles -->
            <ul class="social-media-list">


                <a href="https://facebook.com/lindelin.org" title="Lindalë on Facebook" target="_blank">
                    <li>
      <span class="icon">
        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M15.117 0H.883C.395 0 0 .395 0 .883v14.234c0 .488.395.883.883.883h7.663V9.804H6.46V7.39h2.086V5.607c0-2.066 1.262-3.19 3.106-3.19.883 0 1.642.064 1.863.094v2.16h-1.28c-1 0-1.195.476-1.195 1.176v1.54h2.39l-.31 2.416h-2.08V16h4.077c.488 0 .883-.395.883-.883V.883C16 .395 15.605 0 15.117 0" fill-rule="nonzero"/></svg>

      </span>
                    </li>
                </a>



                <a href="https://github.com/lindelin" title="Lindalë on Github" target="_blank">
                    <li>
      <span class="icon">
        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M8 0C3.58 0 0 3.582 0 8c0 3.535 2.292 6.533 5.47 7.59.4.075.547-.172.547-.385 0-.19-.007-.693-.01-1.36-2.226.483-2.695-1.073-2.695-1.073-.364-.924-.89-1.17-.89-1.17-.725-.496.056-.486.056-.486.803.056 1.225.824 1.225.824.714 1.223 1.873.87 2.33.665.072-.517.278-.87.507-1.07-1.777-.2-3.644-.888-3.644-3.953 0-.873.31-1.587.823-2.147-.083-.202-.358-1.015.077-2.117 0 0 .672-.215 2.2.82.638-.178 1.323-.266 2.003-.27.68.004 1.364.092 2.003.27 1.527-1.035 2.198-.82 2.198-.82.437 1.102.163 1.915.08 2.117.513.56.823 1.274.823 2.147 0 3.073-1.87 3.75-3.653 3.947.287.246.543.735.543 1.48 0 1.07-.01 1.933-.01 2.195 0 .215.144.463.55.385C13.71 14.53 16 11.534 16 8c0-4.418-3.582-8-8-8"/></svg>

      </span>
                    </li>
                </a>



                <a href="https://plus.google.com/u/0/104026286826983321347" title="Lindalë on Google Plus" target="_blank">
                    <li>
      <span class="icon">
        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><g><path d="M5.09 7.273v1.745H7.98c-.116.75-.873 2.197-2.887 2.197-1.737 0-3.155-1.44-3.155-3.215S3.353 4.785 5.09 4.785c.99 0 1.652.422 2.03.786l1.382-1.33c-.887-.83-2.037-1.33-3.41-1.33C2.275 2.91 0 5.184 0 8s2.276 5.09 5.09 5.09c2.94 0 4.888-2.065 4.888-4.974 0-.334-.036-.59-.08-.843H5.09zM16 7.273h-1.455V5.818H13.09v1.455h-1.454v1.454h1.455v1.455h1.455V8.727H16"/></g></svg>

      </span>
                    </li>
                </a>



                <a href="https://www.instagram.com/lindelin_org" title="Lindalë on Instagram" target="_blank">
                    <li>
      <span class="icon">
        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M14.154 16H1.846C.826 16 0 15.173 0 14.153V1.846C0 .826.826 0 1.846 0h12.308C15.174 0 16 .826 16 1.846v12.307c0 1.02-.826 1.847-1.846 1.847M8 4.923C6.3 4.923 4.923 6.3 4.923 8S6.3 11.077 8 11.077 11.077 9.7 11.077 8C11.077 6.3 9.7 4.923 8 4.923m6.154-2.462c0-.34-.275-.614-.616-.614h-1.846c-.34 0-.615.275-.615.615V4.31c0 .34.276.615.615.615h1.846c.34 0 .616-.276.616-.615V2.46zm0 4.31H12.76c.103.392.163.804.163 1.23 0 2.72-2.204 4.923-4.923 4.923-2.72 0-4.923-2.204-4.923-4.923 0-.426.06-.838.162-1.23H1.845v6.768c0 .34.275.615.616.615h11.076c.34 0 .616-.275.616-.615v-6.77z"/></svg>

      </span>
                    </li>
                </a>



                <a href="https://www.pscp.tv/Lindelin_org" title="Lindalë on Periscope" target="_blank">
                    <li>
      <span class="icon">
        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M8.09 16c1.25 0 6.21-5.626 6.21-9.397C14.3 2.993 11.48 0 8.09 0 4.52 0 1.7 2.992 1.7 6.603 1.7 10.373 6.66 16 8.09 16zM7.093 2.564c.323-.08.663-.123 1.016-.123 2.008 0 3.725 1.7 3.725 3.906 0 1.988-1.717 3.688-3.725 3.688-2.228 0-3.945-1.7-3.945-3.688 0-.928.304-1.766.822-2.426v.012c0 .824.674 1.492 1.506 1.492S8 4.756 8 3.932c0-.612-.373-1.138-.906-1.368z"/></svg>

      </span>
                    </li>
                </a>



                <a href="https://www.reddit.com/u/Lindelin" title="Lindalë on Reddit" target="_blank">
                    <li>
      <span class="icon">
        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M1.473 9.368c-.04.185-.06.374-.06.566 0 2.3 2.94 4.173 6.554 4.173 3.613 0 6.553-1.872 6.553-4.173 0-.183-.02-.364-.055-.54l-.01-.022c-.013-.036-.02-.073-.02-.11-.2-.784-.745-1.497-1.533-2.072-.03-.01-.058-.026-.084-.047-.017-.013-.03-.028-.044-.043-1.198-.824-2.91-1.34-4.807-1.34-1.88 0-3.576.506-4.772 1.315-.01.012-.02.023-.033.033-.026.022-.056.04-.087.05-.805.576-1.364 1.293-1.572 2.086 0 .038-.01.077-.025.114l-.005.01zM8 13.003c-1.198 0-2.042-.26-2.58-.8-.116-.116-.116-.305 0-.422.117-.116.307-.116.424 0 .42.42 1.125.625 2.155.625 1.03 0 1.735-.204 2.156-.624.116-.116.306-.116.422 0 .117.118.117.307 0 .424-.538.538-1.382.8-2.58.8zM5.592 7.945c-.61 0-1.12.51-1.12 1.12 0 .608.51 1.102 1.12 1.102.61 0 1.103-.494 1.103-1.102 0-.61-.494-1.12-1.103-1.12zm4.83 0c-.61 0-1.12.51-1.12 1.12 0 .608.51 1.102 1.12 1.102.61 0 1.103-.494 1.103-1.102 0-.61-.494-1.12-1.103-1.12zM13.46 6.88c.693.556 1.202 1.216 1.462 1.94.3-.225.48-.578.48-.968 0-.67-.545-1.214-1.214-1.214-.267 0-.52.087-.728.243zM1.812 6.64c-.67 0-1.214.545-1.214 1.214 0 .363.16.7.43.927.268-.72.782-1.375 1.478-1.924-.202-.14-.443-.218-.694-.218zm6.155 8.067c-3.944 0-7.152-2.14-7.152-4.77 0-.183.016-.363.046-.54C.33 9.068 0 8.487 0 7.852c0-1 .813-1.812 1.812-1.812.446 0 .87.164 1.2.455 1.24-.796 2.91-1.297 4.75-1.33l1.208-3.69.264.063c.002 0 .004 0 .006.002l2.816.663c.228-.533.757-.908 1.373-.908.822 0 1.49.67 1.49 1.492 0 .823-.668 1.492-1.49 1.492-.823 0-1.492-.67-1.493-1.49l-2.57-.606L8.39 5.17c1.773.07 3.374.572 4.57 1.35.333-.307.767-.48 1.228-.48 1 0 1.812.814 1.812 1.813 0 .665-.354 1.26-.92 1.578.025.166.04.334.04.504-.002 2.63-3.21 4.77-7.153 4.77zM13.43 1.893c-.494 0-.895.4-.895.894 0 .493.4.894.894.894.49 0 .892-.4.892-.893s-.4-.894-.893-.894z"/></svg>

      </span>
                    </li>
                </a>



                <a href="https://twitter.com/Lindelin_info" title="Lindalë on Twitter" target="_blank">
                    <li>
      <span class="icon">
        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M16 3.038c-.59.26-1.22.437-1.885.517.677-.407 1.198-1.05 1.443-1.816-.634.375-1.337.648-2.085.795-.598-.638-1.45-1.036-2.396-1.036-1.812 0-3.282 1.468-3.282 3.28 0 .258.03.51.085.75C5.152 5.39 2.733 4.084 1.114 2.1.83 2.583.67 3.147.67 3.75c0 1.14.58 2.143 1.46 2.732-.538-.017-1.045-.165-1.487-.41v.04c0 1.59 1.13 2.918 2.633 3.22-.276.074-.566.114-.865.114-.21 0-.416-.02-.617-.058.418 1.304 1.63 2.253 3.067 2.28-1.124.88-2.54 1.404-4.077 1.404-.265 0-.526-.015-.783-.045 1.453.93 3.178 1.474 5.032 1.474 6.038 0 9.34-5 9.34-9.338 0-.143-.004-.284-.01-.425.64-.463 1.198-1.04 1.638-1.7z" fill-rule="nonzero"/></svg>

      </span>
                    </li>
                </a>



                <a href="https://www.youtube.com/channel/UCsKKF81Qej8MiZyDyEQHRXA" title="Lindalë on YouTube" target="_blank">
                    <li>
      <span class="icon">
        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M0 7.345c0-1.294.16-2.59.16-2.59s.156-1.1.636-1.587c.608-.637 1.408-.617 1.764-.684C3.84 2.36 8 2.324 8 2.324s3.362.004 5.6.166c.314.038.996.04 1.604.678.48.486.636 1.588.636 1.588S16 6.05 16 7.346v1.258c0 1.296-.16 2.59-.16 2.59s-.156 1.102-.636 1.588c-.608.638-1.29.64-1.604.678-2.238.162-5.6.166-5.6.166s-4.16-.037-5.44-.16c-.356-.067-1.156-.047-1.764-.684-.48-.487-.636-1.587-.636-1.587S0 9.9 0 8.605v-1.26zm6.348 2.73V5.58l4.323 2.255-4.32 2.24h-.002z"/></svg>
      </span>
                    </li>
                </a>


            </ul><!-- End social profiles -->

            <span class="copyright">
      Copyright &copy; {{ date('Y') }} {{ config('app.name') }}
    </span>

            <span class="made-with">
      Lindalë <a class="link" href="https://github.com/lindelin/lindale/releases" target="_blank">{{ config('app.version') }}</a>
    </span>
        </div>
    </footer>
</header>
</body>

</html>