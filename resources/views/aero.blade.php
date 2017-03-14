<!DOCTYPE html>
<html>
<head>
    <title>Aero</title>
    <meta charset="utf-8">
    <link href="kendo/content/shared/styles/examples-offline.css" rel="stylesheet">
    <link href="kendo/styles/kendo.common.min.css" rel="stylesheet">
    <link href="kendo/styles/kendo.rtl.min.css" rel="stylesheet">
    <link href="kendo/styles/kendo.default.min.css" rel="stylesheet">
    <link href="kendo/styles/kendo.default.mobile.min.css" rel="stylesheet">
    <script src="kendo/js/jquery.min.js"></script>
    <script src="kendo/js/jszip.min.js"></script>
    <script src="kendo/js/kendo.all.min.js"></script>
    <script src="kendo/content/shared/js/console.js"></script> 
    <script src="kendo/content/spa/aeroviewr/js/500px.js"></script>
    <script src="kendo/content/spa/aeroviewr/js/aeroviewr.js"></script>
    <link href="kendo/content/spa/aeroviewr/css/aeroviewr.css" rel="stylesheet">
</head>
<body>
    <div id="main_body">
        <div id="megaStore">
            <ul id="menu">
                <li><a href="{{ url('/')}}">Home</a></li>
                <li><a href="{{ url('/aero')}}">Aero</a></li>
                <li><a href="{{ url('/courosel')}}">Courosel</a></li>
                <li><a href="{{ url('/calendar')}}">Calendar</a></li>
                <li><a href="{{ url('/clock')}}">Clock</a></li>
                <li><a href="{{ url('/datepicker')}}">Datepicker</a></li>
                <li><a href="{{ url('/diagram')}}">Diagram</a></li>
                <li><a href="{{ url('/editor')}}">Editor</a></li>
                <li><a href="{{ url('/grid')}}">Grid</a></li>
                <li><a href="{{ url('/panel')}}">Panel</a></li>
                <li><a href="{{ url('/treeview')}}">Treeview</a></li>
                <li><a href="{{ url('/tabstrip')}}">Tabstrip</a></li>
                <li><a href="{{ url('/chart')}}">chart</a></li>
                <li><a href="{{ url('/treelist')}}">Treelist</a></li>
                <li><a href="{{ url('/media')}}">Media</a></li>
                <li><a href="{{ url('/scheduler')}}">Scheduler</a></li>
                <li><a href="{{ url('/export')}}">Export</a></li>
                <li><a href="{{ url('/modal')}}">Windows</a></li>
                <li><a href="{{ url('/about')}}">About</a></li>
            </ul>
        </div>
        <style>
            #main_body {
                position:fixed;
                height:45px;
                width:100%;
                top:0px;
                left:0px;
            }
            #megaStore {
                margin: 0px auto;                
/*                padding-top: 100px;
                background: url('kendo/content/web/menu/header.jpg') no-repeat center 0;*/
            }
            #menu{
                width:100%;
                font-size: 1em;
                text-transform: uppercase;
                padding: 5px 10px;
            }
            #template img {
                margin: 5px 20px 0 0;
                float: left;
            }
            #template {
                width: 380px;
            }
            #template ol {
                float: left;
                margin: 0 0 0 30px;
                padding: 10px 10px 0 10px;
            }
            #template:after {
                content: ".";
                display: block;
                height: 0;
                clear: both;
                visibility: hidden;
            }
            #template .k-button {
                float: left;
                clear: left;
                margin: 5px 0 5px 12px;
            }
            #example{
                margin: 55px 0 5px 12px;
            }
        </style>
        <script>
            $(document).ready(function() {
                $("#menu").kendoMenu();
            });
        </script>
    </div>   
        <!-- Google Tag Manager -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-6X92" height="0" width="0" style="display: none; visibility: hidden"></iframe>
        </noscript>
        <script>(function(w, d, s, l, i) { w[l] = w[l] || []; w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' }); var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f); })(window, document, 'script', 'dataLayer', 'GTM-6X92');</script>
        <!-- End Google Tag Manager -->
        <div id="root"></div>

        <script type="text/x-kendo-template" id="main">
            <header>
                <form data-bind="events: { submit: performSearch }">
                    <label>Search: <input type="search" data-bind="value: query" /></label>
                </form>
                <h1 class="aeroLogo"><a href="">aero<span>viewr</span></a></h1>&nbsp;
                <!--button id="slideshow-button" data-bind="text: slideShowButtonText, click: toggleSlideShow"></button-->
            </header>

            <section data-bind="events: { click: toggleFocus }" id="image-container">
                <div id="image-wrap">
                    <div id="image-inner-wrap" data-bind="events: { click: toggleShowDetails }">
                        <section data-bind="attr: { class: detailsClass }" id="details">
                            <div>
                                <h2 data-bind="text: currentPhoto.name, visible: currentPhoto.name"></h2>
                                <p data-bind="html: currentPhoto.description, visible: currentPhoto.description"></p>
                                <ul>
                                    <li data-bind="visible: currentPhoto.camera"><span>Camera</span><div data-bind="text: currentPhoto.camera"></div></li>
                                    <li data-bind="visible: currentPhoto.focal_length"><span>Focal Length</span><div data-bind="text: currentPhoto.focal_length"></div></li>
                                    <li data-bind="visible: currentPhoto.shutter_speed"><span>Shutter Speed</span><div data-bind="text: currentPhoto.shutter_speed"></div></li>
                                    <li data-bind="visible: currentPhoto.aperture"><span>Aperture</span><div data-bind="text: currentPhoto.aperture"></div></li>
                                    <li data-bind="visible: currentPhoto.iso"><span>ISO</span><div data-bind="text: currentPhoto.iso"></div></li>
                                    <li data-bind="visible: currentPhoto.times_viewed"><span>Times Viewed</span><div data-bind="text: currentPhoto.times_viewed"></div></li>
                                    <li data-bind="visible: currentPhoto.rating"><span>Rating</span><div data-bind="text: currentPhoto.rating + '%'"></div></li>
                                    <li data-bind="visible: currentPhoto.categoryName"><span>Category</span><div data-bind="text: currentPhoto.categoryName"></div></li>
                                    <li data-bind="visible: currentPhoto.user.fullname"><span>Copyright</span><div data-bind="text: currentPhoto.user.fullname"></div></li>
                                    <li data-bind="invisible: currentPhoto.noAvatar"><span>Avatar</span><div><img data-bind="attr: { src: currentPhoto.user.userpic_url }"/></div></li>
                                </ul>
                            </div>
                        </section>
                        <div class="loading" data-bind="style: { width: currentPhoto.calculatedWidth }">
                            <div class="image" data-bind="style: { backgroundImage: currentPhoto.backgroundPhoto, width: currentPhoto.calculatedWidth, visibility: currentPhoto.image_url ? 'visible' : 'hidden' } "></div>
                        </div>
                    </div>
                </div>
            </section>

            <footer>
                <a data-bind="click: scrollLeft" id="scroll-left" class="scroll-arrow">&#x2039;</a>
                <div data-role="listview" data-auto-bind="false" data-bind="{ source: photos }" data-template="photo-thumb" id="photo-thumbs"></div>
                <a data-bind="click: scrollRight" id="scroll-right" class="scroll-arrow">&#x203A;</a>
            </footer>
        </script>

        <script type="text/x-kendo-template" id="photo-thumb">
            <a data-bind="attr: { href: thumbHref, class: thumbClass }"><img data-bind="attr: { src: image_url }"></a>
        </script>      
</body>
</html>
