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

    <title>503 - Lindalë</title>

    <meta name="description" content="The Project Manager For Everyone.">

    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Fira+Sans:300,300italic,400,400italic' rel='stylesheet' type='text/css'>
    <style>
        html{font-size:62.5%}blockquote,body,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,ol,p,pre,ul{margin:0;padding:0}body{font:300 2rem/1.8 "Fira Sans",Helvetica,Arial,sans-serif;color:#2e2e2e;background-color:#fdfdfd;-webkit-text-size-adjust:100%;-webkit-font-feature-settings:"kern" 1;-moz-font-feature-settings:"kern" 1;-o-font-feature-settings:"kern" 1;font-feature-settings:"kern" 1;font-kerning:normal;-webkit-font-smoothing:antialiased;max-width:100%}main{min-height:66.66666666vh}main table{margin:0 auto 2rem;max-width:80%}main table *{padding:.2rem .5rem}main table th{text-align:center!important;font-family:"Playfair Display","Times New Roman",serif}main table td,main table th{border:1px solid #e5e5e5}main table td:first-of-type,main table th:first-of-type{border-left:none}main table td:last-of-type,main table th:last-of-type{border-right:none}main table th{border-bottom:2px solid #a5a5a5}.highlight,blockquote,dl,figure,h1,h2,h3,h4,h5,h6,ol,p,pre,ul{margin-bottom:2rem}iframe,img{max-width:100%;vertical-align:middle}figure>img{display:block}figcaption{font-size:1.75rem}ol,ul{margin-left:2rem}li>ol,li>ul{margin-bottom:0}dl dt{font-family:"Playfair Display","Times New Roman",serif}dl dd{margin-left:2rem;font-style:italic}ul.grid-container{margin-left:0;list-style:none}h1,h2,h3,h4,h5,h6{margin-top:0;margin-bottom:2rem;font-family:"Playfair Display","Times New Roman",serif}h1{font-size:6rem;line-height:1.2;letter-spacing:.1rem}h2{font-size:5rem;line-height:1.25;letter-spacing:.08rem}h3{font-size:3.6rem;line-height:1.3;letter-spacing:.06rem}h4{font-size:2.8rem;line-height:1.35;letter-spacing:.04rem}h5{font-size:2.2rem;line-height:1.5;letter-spacing:.03rem}h6{font-size:2rem;line-height:1.6;letter-spacing:.1}figcaption,ol li,p,span,td,ul li{font-size:2.2rem;line-height:1.8;font-weight:300}@media screen and (max-width:1020px){h1{font-size:5rem}h2{font-size:4rem}h3{font-size:3rem}h4{font-size:2.4rem}h5{font-size:1.8rem}h6{font-size:1.6rem}figcaption,ol li,p,span,td,ul li{font-size:2.2rem}}@media screen and (max-width:800px){h1{font-size:3.6rem}h2{font-size:3.2rem}h3{font-size:2.7rem}h4{font-size:2.3rem}h5{font-size:1.9rem}h6{font-size:1.6rem}figcaption,ol li,p,span,td,ul li{font-size:2rem}}@media screen and (max-width:600px){h1{font-size:3rem}h2{font-size:2.5rem}h3{font-size:2.4rem}h4{font-size:2.2rem}h5{font-size:2rem}h6{font-size:1.4rem}figcaption,ol li,p,span,td,ul li{font-size:1.6rem}}div.pagination a{color:#2e2e2e;position:relative;text-decoration:none;border-bottom:.2rem solid #46bcec}div.pagination a:visited{color:#484848}div.pagination a:hover{color:#2e2e2e}div.pagination a:before{content:'';position:absolute;top:0;left:0;right:0;width:0;height:100%;background:rgba(229,229,229,.4)}div.pagination a:hover:before{width:100%}blockquote{position:relative;display:block;max-width:66.66666666%;border-left:2px solid #a5a5a5;padding-left:3rem;font-size:3.6rem;letter-spacing:-1px;margin:0 auto 2rem}blockquote>:last-child{margin-bottom:0}blockquote:before{content:'"';position:absolute;top:-2rem;left:.5rem;font-size:5rem;color:#e5e5e5}@media screen and (max-width:800px){blockquote{max-width:80%}}code,pre{line-height:1.5;background:#e5e5e5;font-size:1.75rem;display:block}code{padding:0 .2rem;overflow-x:auto;display:inline-block}pre{padding:1rem 1.6rem;margin:0 auto;text-align:left}pre>code{border:0;padding-right:0;padding-left:0;overflow:auto}.wrapper{max-width:-webkit-calc(1440px - (2rem * 2));max-width:calc(1440px - (2rem * 2));margin-right:auto;margin-left:auto;padding-right:2rem;padding-left:2rem}@media screen and (max-width:800px){.wrapper{max-width:-webkit-calc(1440px - (2rem));max-width:calc(1440px - (2rem));padding-right:1rem;padding-left:1rem}}.footer-col-wrapper:after,.grid-container:after,.wrapper:after,a.button:after,div.row:after,section.team-members:after{content:"";display:table;clear:both}.grid-container{clear:both}.grid-container .four-fifths{width:80%}.grid-container .three-quarters{width:75%}.grid-container .two-thirds{width:66.66666666%}.grid-container .three-fifths{width:60%}.grid-container .one-whole{width:50%;margin-left:25%;margin-right:25%}.grid-container .one-half{width:50%}.grid-container .two-fifths{width:40%}.grid-container .one-third{width:33.33333333%}.grid-container .one-quarter{width:25%}.grid-container .one-fifth{width:20%}.grid-container .col{float:left}div.row div{vertical-align:middle}.icon>svg{display:inline-block;width:2rem;height:auto;vertical-align:middle}.icon>svg path{fill:#a5a5a5}.no-margin{margin:0}.left{text-align:left}.right{text-align:right}.hidden{display:none}.site-search{width:100%;background:#fdfdfd}input#search{display:none}div.search-fullscreen{opacity:0;visibility:hidden;-webkit-transition:visibility 0s .5s,opacity .5s;transition:visibility 0s .5s,opacity .5s}input#search:checked+div.search-fullscreen{opacity:1;visibility:visible;-webkit-transition:opacity .5s;transition:opacity .5s}input#search:checked~nav.menu a.nav-link{opacity:1}.site-header{width:100%;border-top:.1rem solid #e5e5e5;background:#fdfdfd}.site-title h1{float:left;font-weight:300;line-height:5rem;margin-bottom:0;margin-left:2rem;color:#a5a5a5}@media screen and (max-width:600px){.site-title h1{margin-left:1rem}}.site-title h1:hover{text-decoration:none}div.icon-container{display:block;margin:1rem auto 0;width:4rem;height:4rem;margin-right:2rem;position:relative}@media screen and (max-width:600px){div.icon-container{margin-right:1rem}}div.icon-container>label,div.nav-container>label{cursor:pointer;position:absolute;left:0;top:0;-webkit-transition:opacity .5s ease-in;transition:opacity .5s ease-in;z-index:100}div.icon-container>label>svg,div.nav-container>label>svg{width:3rem;height:auto}div.icon-container>label>svg path,div.icon-container>label>svg rect,div.nav-container>label>svg path,div.nav-container>label>svg rect{fill:#a5a5a5}div.icon-container:hover{cursor:pointer}input#ctrl{display:none}div.nav-container{position:fixed;width:100%;height:100%;left:0;top:0;background:rgba(2,2,2,.9);text-align:center;z-index:100}div.nav-container label{position:relative;width:100%;height:5rem}@media screen and (max-width:600px){div.nav-container label{margin-right:1rem}}div.nav-container label svg.close-nav{float:right;margin:1.25rem 3rem auto}div.nav-container label svg.close-nav path,div.nav-container label svg.close-nav rect{fill:#fdfdfd}nav.menu{clear:both;position:relative;top:20%;max-width:95%;margin:0 auto}nav.menu a.nav-link,nav.menu a.nav-title{text-decoration:none}nav.menu a.nav-link h1,nav.menu a.nav-title h1{margin-bottom:2rem}@media screen and (max-width:600px){nav.menu a.nav-link h1,nav.menu a.nav-title h1{font-size:5rem}}nav.menu a.nav-link{display:inline-block;clear:none;position:relative;display:inline-block;color:#fdfdfd;font-size:3rem;opacity:.8;-webkit-transition:opacity .5s ease-in;transition:opacity .5s ease-in}nav.menu a.nav-link:not(:last-of-type){margin:1rem}@media screen and (max-width:600px){nav.menu a.nav-link{font-size:1.8rem;font-weight:400;margin:0 .66667rem}nav.menu a.nav-link:not(:last-of-type){margin:.5rem}}nav.menu a.nav-link:after{content:'';position:absolute;bottom:0;left:0;width:0;height:.5rem;background:#fdfdfd}nav.menu a.nav-link:focus,nav.menu a.nav-link:hover,nav.menu h1{color:#fdfdfd}nav.menu a.nav-link:focus:after,nav.menu a.nav-link:hover:after,nav.menu h1:after{width:100%}nav.menu div.nav-border{display:block;margin:0 auto auto;width:12.5%;border-bottom:.1rem solid #fdfdfd}@media screen and (max-width:800px){nav.menu div.nav-border{width:25%}}@media screen and (max-width:600px){nav.menu div.nav-border{width:33.33333333%;margin:1rem auto auto}}div.icon-container~div.fullscreen{opacity:0;visibility:hidden;-webkit-transition:visibility 0s .5s,opacity .5s;transition:visibility 0s .5s,opacity .5s}input#ctrl:checked+div.icon-container~div.fullscreen{opacity:1;visibility:visible;-webkit-transition:opacity .5s;transition:opacity .5s}input#ctrl:checked~nav.menu a.nav-link{opacity:1}.site-footer{border-top:1px solid #f4f4f4;padding:2rem 0;text-align:center;width:60%;margin:0 auto}@media screen and (max-width:1020px){.site-footer{width:66.66666666%}}@media screen and (max-width:600px){.site-footer{width:75%}}.footer-heading{color:#e5e5e5}.social-media-list{list-style:none;margin:0 auto 2rem;max-width:80%}.social-media-list li{display:inline-block;margin:0 .5rem}.social-media-list li svg path{fill:#a5a5a5}.social-media-list li:hover svg path{fill:#46bcec}.footer-col-wrapper{font-size:15px;color:#e5e5e5;margin-left:-1rem}.footer-col{float:left;margin-bottom:1rem;padding-left:1rem}.footer-col-1{width:-webkit-calc(50% - (2rem / 2));width:calc(50% - (2rem / 2))}.footer-col-2{width:-webkit-calc(50% - (2rem / 2));width:calc(50% - (2rem / 2))}a.footer-nav{display:block;color:#a5a5a5;font-weight:400}a.footer-nav:hover{color:#2e2e2e}a.footer-nav-left{text-align:right;margin-right:1rem}a.footer-nav-right{text-align:left;margin-left:1rem}span.copyright,span.made-with{font-size:1.75rem;color:#a5a5a5}@media screen and (max-width:600px){span.copyright,span.made-with{font-size:1.2rem}}span.copyright{float:left;font-weight:400}span.made-with{float:right}span.made-with a{color:#a5a5a5;font-weight:400}span.made-with a:hover{color:#2e2e2e}a{text-decoration:none}.page-header h1,.page-header p,.post-content a:before,.post-list a,.post-list span.pocket-icon svg path,.post-list>li,.social-media-list li svg path,a h2.home-header,a.button,a.careers-link,a.footer-nav,a.index-button,div.pagination a:before,nav.menu a.nav-link:after,section#contact button.send,section#related-sections a li div.mask,section#related-sections a li div.tn-container h2,section#related-sections a li div.tn-container p,section#services-container a li div.mask,section#services-container a li div.tn-container h2,section#services-container a li div.tn-container p,section.team-members figure figcaption svg rect,span.made-with a,ul.events-index li.event,ul.social-share-list li svg{-webkit-transition:all 250ms ease-in;transition:all 250ms ease-in}.mask{position:absolute;top:0;left:0;width:100%;height:100%;background-color:rgba(2,2,2,.4)}a.button{display:table;margin:0 auto 2rem;padding:1rem 2rem;border:.1rem solid #2e2e2e;font-weight:400;color:inherit}a.button:hover{color:#46bcec;border:.1rem solid #46bcec}div.text-box{position:absolute;bottom:10%;left:0;width:100%;color:#fdfdfd;text-align:center}div.text-box h1,div.text-box h2,div.text-box h3,div.text-box h5,div.text-box p{padding-left:4%;padding-right:4%}@media screen and (max-width:1440px){div.text-box{bottom:5%}div.text-box h1{font-size:5rem}div.text-box h1.page-title,div.text-box nav.menu h1{font-size:12rem}div.text-box h2{font-size:4rem}div.text-box h3{font-size:3.2rem}div.text-box p.icon-description{font-size:1.6rem}}@media screen and (max-width:1101px){div.text-box{bottom:5%}div.text-box h1{font-size:4rem}div.text-box h1.page-title,div.text-box nav.menu h1{font-size:8rem}div.text-box h2{font-size:3.2rem}div.text-box h3{font-size:2.4rem}div.text-box p.icon-description{font-size:1.2rem}}@media screen and (max-width:800px){div.text-box{bottom:5%}div.text-box h1.page-title,div.text-box nav.menu h1{font-size:6rem}}@media screen and (max-width:600px){div.text-box{bottom:5%}div.text-box h1{font-size:5rem}div.text-box h1.page-title,div.text-box nav.menu h1{font-size:5rem}div.text-box h2{font-size:4rem}div.text-box h3{font-size:3.2rem}div.text-box p.icon-description{font-size:1.6rem}}.page-header{position:relative;display:block;margin:1rem 0 2rem;padding:0;min-height:50vh;max-height:80vh;overflow:hidden}.page-header img.page-hero{margin:0;width:100%;height:auto}@media screen and (max-width:600px){.page-header img.page-hero{display:none}}.page-header img.mobile-hero{display:none;margin:0;width:100%;height:auto}@media screen and (max-width:600px){.page-header img.mobile-hero{display:block}}.page-header div.text-box{padding:0}.page-header div.text-box p{padding-right:8%;padding-left:8%}.page-header h1,.page-header p{opacity:.6;margin:0}@media screen and (max-width:600px){.page-header h1,.page-header p{opacity:.8}}.page-header h1{text-align:center;font-size:18rem;margin-bottom:0;padding:0 5%;line-height:1}@media screen and (max-width:800px){.page-header h1{font-size:14rem}}@media screen and (max-width:600px){.page-header h1{font-size:6rem}}.page-header h1:hover h1,.page-header h1:hover p{opacity:1}.long-title h1{font-size:10rem}@media screen and (max-width:800px){.long-title h1{font-size:6rem}}@media screen and (max-width:600px){.long-title h1{font-size:4rem}}section#related-sections,section#services-container{display:block;width:90%;margin:0 auto 2rem;position:relative}section#related-sections *,section#services-container *{box-sizing:border-box;line-height:1.2}section#related-sections a li,section#services-container a li{display:inline-block;padding:0 2.5%;color:#fdfdfd;text-align:center;margin-bottom:2rem}section#related-sections a li img,section#services-container a li img{margin:0}section#related-sections a li div.tn-container,section#services-container a li div.tn-container{position:relative;margin:2%;overflow:hidden}section#related-sections a li div.tn-container h2,section#related-sections a li div.tn-container p,section#services-container a li div.tn-container h2,section#services-container a li div.tn-container p{opacity:.8}@media screen and (max-width:1020px){section#related-sections a li div.tn-container,section#services-container a li div.tn-container{margin:1.5%}}@media screen and (max-width:800px){section#related-sections a li,section#services-container a li{width:50%}}@media screen and (max-width:600px){section#related-sections a li,section#services-container a li{float:none;display:block;width:100%;margin:0 auto 2rem}}section#related-sections a li:hover div.mask,section#services-container a li:hover div.mask{background-color:rgba(2,2,2,.6)}section#related-sections a li:hover h2,section#related-sections a li:hover p,section#services-container a li:hover h2,section#services-container a li:hover p{opacity:1}@media screen and (max-width:800px){section#related-sections a li.final-col,section#services-container a li.final-col{margin:2rem 25%}}@media screen and (max-width:600px){section#related-sections a li.final-col,section#services-container a li.final-col{margin:auto}}.page-content{padding:0}a.index-button{text-align:center;margin:0 auto 1rem;padding:1rem 2rem;border:.15rem solid #2e2e2e;display:none;font-weight:400}.post-list{display:block;margin:0 auto 2rem;width:60%;list-style:none}.post-list>li{margin-bottom:2rem;padding:2rem}.post-list li:nth-of-type(even){background:#e5e5e5}.post-list a{text-decoration:none;color:#2e2e2e}.post-list h2 a:hover{color:#46bcec}.post-list span.post-meta{float:right;display:table}@media screen and (max-width:600px){.post-list span.post-meta{font-size:1.4rem}}.post-list span.pocket-icon svg{width:2rem;height:2rem}.post-list span.pocket-icon svg path{fill:#a5a5a5}.post-list span.pocket-icon svg:hover path{fill:#ed4055}.post-list li:hover{border-bottom:.3rem solid #2e2e2e}.post-list li:hover a.index-button{display:table}.post-list a.index-button:hover{color:#46bcec;border:.15rem solid #46bcec}@media screen and (max-width:1020px){.post-list{width:66.66666666%}}@media screen and (max-width:600px){.post-list{width:80%}}.post-meta{font-weight:400;color:#a5a5a5}.post-link{display:block}h1.page-heading{width:33.33333333%;margin:0 auto 2rem;border-bottom:1px solid #a5a5a5;text-align:center}h2.page-heading{width:33.33333333%;margin:0 auto 2rem;border-bottom:1px solid #a5a5a5;text-align:center}h3.page-heading{width:33.33333333%;margin:0 auto 2rem;border-bottom:1px solid #a5a5a5;text-align:center}div.pagination{display:block;margin:0 auto 2rem;max-width:66.66666666%;color:#2e2e2e;text-align:center}div.pagination .next,div.pagination .previous{padding:.5rem 1rem;font-weight:400}div.pagination .previous{margin-right:2rem}div.pagination .next{margin-left:2rem}@media screen and (max-width:600px){div.pagination{max-width:100%}}.post-content,.post-header{display:block;width:60%;margin:2rem auto 0;position:relative}.post-content>.post-meta,.post-header>.post-meta{display:block;text-align:center;margin-bottom:0}@media screen and (max-width:1020px){.post-content,.post-header{width:66.66666666%}}@media screen and (max-width:600px){.post-content,.post-header{width:90%}}.post-content{margin-bottom:2rem}ul.social-share-list{display:block;text-align:center;list-style:none;margin:0 auto}ul.social-share-list a{text-decoration:none}ul.social-share-list li{display:inline-block;margin:0 1rem}ul.social-share-list li svg{width:2.8rem;height:2.8rem;margin:0}ul.social-share-list li svg path{fill:#a5a5a5}ul.social-share-list li.share-facebook:hover svg path{fill:#3b5998}ul.social-share-list li.share-twitter:hover svg path{fill:#4099ff}ul.social-share-list li.share-linkedin:hover svg path{fill:#4875b4}.post-content a{color:#2e2e2e;position:relative;text-decoration:none;border-bottom:.2rem solid #46bcec}.post-content a:visited{color:#484848}.post-content a:hover{color:#2e2e2e}.post-content a:before{content:'';position:absolute;top:0;left:0;right:0;width:0;height:100%;background:rgba(229,229,229,.4)}.post-content a:hover:before{width:100%}.collection-content{background:#f4f4f4;padding:2rem;margin:0 auto 2rem;box-sizing:border-box}iframe,img{display:block;margin:0 auto 2rem}ul.events-index{width:60%;margin:0 auto 2rem;list-style:none;box-sizing:border-box}ul.events-index a{color:#2e2e2e;text-decoration:none}ul.events-index li.event{margin:0 auto 2rem;padding:2rem;background:#f4f4f4;border:.03rem solid #f4f4f4}ul.events-index li.event:hover{border-bottom:.4rem solid #2e2e2e}ul.events-index li.event:hover .index-button{display:table}ul.events-index .index-button:hover{display:table;color:#46bcec;border:.15rem solid #46bcec}ul.events-index .event-meta{float:right}@media screen and (max-width:600px){ul.events-index .event-meta{float:none}}ul.events-index h2:hover{color:#46bcec}@media screen and (max-width:1020px){ul.events-index{width:66.66666666%}}@media screen and (max-width:600px){ul.events-index{width:80%}}span.event-icon svg{width:2rem;height:2rem}span.event-icon path{fill:#a5a5a5}span.clock svg circle,span.clock svg path{stroke:#a5a5a5}div#map_wrapper{height:500px;width:auto}@media screen and (max-width:600px){div#map_wrapper{height:300px}}.event-texts{display:block;width:60%;margin:2rem auto auto;background:#f4f4f4;padding:2rem;box-sizing:border-box}@media screen and (max-width:1020px){.event-texts{width:66.66666666%}}@media screen and (max-width:600px){.event-texts{width:85%}}.event-texts span.event-meta{font-family:"Fira Sans",Helvetica,Arial,sans-serif;color:#a5a5a5}p.page-intro,section#contact,section.office-locations,section.team-members{width:75%;margin:0 auto 2rem;position:relative}@media screen and (max-width:1020px){p.page-intro,section#contact,section.office-locations,section.team-members{width:80%}}@media screen and (max-width:600px){p.page-intro,section#contact,section.office-locations,section.team-members{width:95%}}#aboutmap_wrapper{height:420px}@media screen and (max-width:600px){#aboutmap_wrapper{height:300px}}.map-container{width:66.66666666%;display:block;margin:0 auto}section.team-members div.member-container{padding:0 1rem;box-sizing:border-box}section.team-members figure{width:100%;background:#f4f4f4;padding:2rem;margin:0 auto 2rem;display:inline-block;box-sizing:border-box}@media screen and (max-width:600px){section.team-members figure{padding:1rem}}section.team-members figure img{float:right;border:none;border-radius:50%}@media screen and (max-width:600px){section.team-members figure img{float:none;text-align:center}}section.team-members figure figcaption svg{width:4.2rem;height:2.8rem;margin-top:1rem}section.team-members figure figcaption svg polygon{fill:#fdfdfd}section.team-members figure figcaption svg rect{fill:#a5a5a5}section.team-members figure figcaption svg:hover rect{fill:#46bcec}section.team-members figure span{display:block}section.team-members figure span.member-name,section.team-members figure span.member-role{font-family:"Playfair Display","Times New Roman",serif}section.team-members .final-col{float:none;margin:0 auto}@media screen and (max-width:800px){div.member-container.one-half.col{float:none;display:block;width:90%;margin:0 auto 2rem}}section#contact input.email,section#contact input.name,section#contact textarea{display:block;width:75%;margin:0 auto 2rem;background:#f4f4f4;border:none;padding:1rem .5rem}@media screen and (max-width:600px){section#contact input.email,section#contact input.name,section#contact textarea{width:85%}}section#contact button.send{display:block;margin:0 auto 2rem;border:1px solid #2e2e2e;background:#fdfdfd;color:#2e2e2e;font-weight:400;padding:1rem 2rem}section#contact button.send:hover{color:#46bcec;border:1px solid #46bcec}section#contact div.status{display:table;margin:0 auto 1rem;text-align:center;font-weight:400;padding:1rem 2rem}section#contact div.failure{color:#e0021f;border:1px solid #e0021f}section#contact div.success{color:#47edc9;border:1px solid #47edc9}ul.careers-index{margin-left:0;list-style:none;display:block;width:60%;margin:0 auto 2rem;background:#f4f4f4;padding:2rem;box-sizing:border-box}@media screen and (max-width:1020px){ul.careers-index{width:66.66666666%}}@media screen and (max-width:600px){ul.careers-index{width:85%}}p.vacancy-description{padding:0 10%}a.careers-link{color:#2e2e2e;display:table;margin:0 auto 2rem;text-align:center}a.careers-link h2{border-top:.2rem solid #2e2e2e;padding-top:1rem}a.careers-link p{border-bottom:.2rem solid #2e2e2e;padding-bottom:2rem}a.careers-link:hover{color:#46bcec}section.home-feature{margin-top:-1rem}a h2.home-header{display:table;padding-bottom:1rem;border-bottom:2px solid #46bcec;color:#2e2e2e}a h2.home-header:hover{color:#46bcec}.tag-link{font-size:3rem;font-weight:700;margin:4px}.back-to-top-button{position:fixed;bottom:96px;right:24px;width:40px;height:40px;background:#fdfdfd;border:.1rem solid #2e2e2e;padding:8px;display:none}@media screen and (max-width:1020px){.back-to-top-button{bottom:80px;width:32px!important;height:32px!important}}@media screen and (max-width:600px){.back-to-top-button{bottom:56px!important;right:8px!important;width:32px!important;height:32px!important;padding:4px!important}}.search-form-button{position:fixed;bottom:24px;right:24px;width:40px;height:40px;background:#fdfdfd;border:.1rem solid #2e2e2e;padding:8px}@media screen and (max-width:1020px){.search-form-button{width:32px!important;height:32px!important}}@media screen and (max-width:600px){.search-form-button{bottom:8px!important;right:8px!important;width:32px!important;height:32px!important;padding:4px!important}}.search-button{display:table;margin:40px auto 2rem;padding:0 2rem;border:.1rem solid #fdfdfd;font-weight:400;color:#fdfdfd;background:rgba(2,2,2,.9)}.search-input{display:block;width:50%;margin:0 auto 2rem;background:#fdfdfd;border:none;padding:1rem .5rem}.highlight{background:#fff}.highlighter-rouge .highlight{background:#e5e5e5}.highlight .c{color:#998;font-style:italic}.highlight .err{color:#a61717;background-color:#e3d2d2}.highlight .k{font-weight:700}.highlight .o{font-weight:700}.highlight .cm{color:#998;font-style:italic}.highlight .cp{color:#999;font-weight:700}.highlight .c1{color:#998;font-style:italic}.highlight .cs{color:#999;font-weight:700;font-style:italic}.highlight .gd{color:#000;background-color:#fdd}.highlight .gd .x{color:#000;background-color:#faa}.highlight .ge{font-style:italic}.highlight .gr{color:#a00}.highlight .gh{color:#999}.highlight .gi{color:#000;background-color:#dfd}.highlight .gi .x{color:#000;background-color:#afa}.highlight .go{color:#888}.highlight .gp{color:#555}.highlight .gs{font-weight:700}.highlight .gu{color:#aaa}.highlight .gt{color:#a00}.highlight .kc{font-weight:700}.highlight .kd{font-weight:700}.highlight .kp{font-weight:700}.highlight .kr{font-weight:700}.highlight .kt{color:#458;font-weight:700}.highlight .m{color:#099}.highlight .s{color:#d14}.highlight .na{color:teal}.highlight .nb{color:#0086b3}.highlight .nc{color:#458;font-weight:700}.highlight .no{color:teal}.highlight .ni{color:purple}.highlight .ne{color:#900;font-weight:700}.highlight .nf{color:#900;font-weight:700}.highlight .nn{color:#555}.highlight .nt{color:navy}.highlight .nv{color:teal}.highlight .ow{font-weight:700}.highlight .w{color:#bbb}.highlight .mf{color:#099}.highlight .mh{color:#099}.highlight .mi{color:#099}.highlight .mo{color:#099}.highlight .sb{color:#d14}.highlight .sc{color:#d14}.highlight .sd{color:#d14}.highlight .s2{color:#d14}.highlight .se{color:#d14}.highlight .sh{color:#d14}.highlight .si{color:#d14}.highlight .sx{color:#d14}.highlight .sr{color:#009926}.highlight .s1{color:#d14}.highlight .ss{color:#990073}.highlight .bp{color:#999}.highlight .vc{color:teal}.highlight .vg{color:teal}.highlight .vi{color:teal}.highlight .il{color:#099}/*! normalize.css v3.0.2 | MIT License | git.io/normalize */html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:700}dfn{font-style:italic}h1{font-size:2em;margin:.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{-moz-box-sizing:content-box;box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=reset],input[type=submit]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type=checkbox],input[type=radio]{box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{border:0;padding:0}textarea{overflow:auto}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}
    </style>

</head>


<body>

<header class="site-header">
    <main class="page-content">
        <div class="home">
            <!-- Homepage feature -->
            <section class="home-feature">
                <header class="page-header no-margin">
                    <div class="mask"></div>
                    <img src="http://jp.lindelin.org/images/featured/404.jpg" alt="Home featured image" class="page-hero" />
                    <img src="http://jp.lindelin.org/images/featured/404-tn.jpg" alt="Home featured image" class="mobile-hero" />
                    <div class="text-box">
                        <p>The Project Manager For Everyone.</p>

                        <nav class="menu">
                            <a href="/" class="nav-title "><h1>Lindalë</h1></a>

                            <a class="nav-link" href="https://www.lindelin.org" target="_blank">About</a>

                            <a class="nav-link" href="https://github.com/lindelin/lindale/issues" target="_blank">Issues</a>

                            <a class="nav-link" href="https://github.com/lindelin/lindale" target="_blank">GitHub</a>

                            <a class="nav-link" href="https://github.com/lindelin/lindale-ios" target="_blank">iOS App</a>

                            <a class="nav-link" href="https://jp.lindelin.org/privacy/" target="_blank">Privacy Policy</a>

                            <div class="nav-border"></div>

                            <br>

                            <p><strong>Be right back.</strong></p>
                            <p><strong>ただ今、メンテナンス中です。 恐れ入りますが、しばらくお待ち下さいますようお願い申し上げます。</strong></p>
                            <p><strong>稍等片刻, 马上回来!</strong></p>

                        </nav>

                    </div>
                </header>
            </section><!-- End homepage feature -->
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