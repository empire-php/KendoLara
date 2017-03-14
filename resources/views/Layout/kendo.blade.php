<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
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
</head>
<body>
    <div id="main_body">
        <div id="megaStore">
			<ul id="menu">
				<li><a href="{{ url('/')}}">Home</a></li>
                <li><a href="{{ url('/courosel')}}">Courosel</a></li>
				<li><a href="{{ url('/datepicker')}}">Datepicker</a></li>
				<li><a href="{{ url('/grid')}}">Grid</a></li>
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
    @section("welcome")
    @show
    @section("body")
    @show
    @section("about")
    @show
</body>
</html>
