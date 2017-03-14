@extends("layout/kendo")
@section('body')
<div id="example">
    <div class="demo-section k-content wide" style="max-width: 925px;">
        <div id="mediaplayer" style="height:360px"></div>
        <div class="k-list-container playlist"><ul id="listView" class="k-list"></ul></div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {

            $("#mediaplayer").kendoMediaPlayer({
                autoPlay: true
            });

            var videos = new kendo.data.DataSource({
                data: [{
                    title: "Telerik Platform - Enterprise Mobility. Unshackled.",
                    poster: "http://img.youtube.com/vi/N3P6MyvL-t4/1.jpg",
                    source: "https://www.youtube.com/watch?v=RGZkVMuCcAg"
                },
                {
                    title: "Learn How York Solved Its Database Problem",
                    poster: "http://img.youtube.com/vi/_S63eCewxRg/1.jpg",
                    source: "https://www.youtube.com/watch?v=gVu79Sh6Lpg"
                },
                {
                    title: "Responsive Website Delivers for Reeves Import Motorcars",
                    poster: "http://img.youtube.com/vi/DYsiJRmIQZw/1.jpg",
                    source: "https://www.youtube.com/watch?v=DYsiJRmIQZw"
                },
                {
                    title: "Digital Transformation: A New Way of Thinking",
                    poster: "http://img.youtube.com/vi/gNlya720gbk/1.jpg",
                    source: "https://www.youtube.com/watch?v=gNlya720gbk"
                },
                {
                    title: "Take a Tour of the Telerik Platform",
                    poster: "http://img.youtube.com/vi/rLtTuFbuf1c/1.jpg",
                    source: "https://www.youtube.com/watch?v=rLtTuFbuf1c"
                },
                {
                    title: "Why Telerik Analytics - Key Benefits For Your Applications",
                    poster: "https://i.ytimg.com/vi/CpHKm2NruYc/1.jpg",
                    source: "https://www.youtube.com/watch?v=CpHKm2NruYc"
                }
                ]
            });

            var listView = $("#listView").kendoListView({
                dataSource: videos,
                selectable: true,
                scrollable: true,
                template: kendo.template($("#template").html()),
                change: onChange,
                dataBound: onDataBound
            });

            function onChange() {
                var index = this.select().index();
                var dataItem = this.dataSource.view()[index];
                $("#mediaplayer").data("kendoMediaPlayer").media(dataItem);
            }

            function onDataBound() {
                this.select(this.element.children().first());
            }

        });
    </script>
    <script type="text/x-kendo-template" id="template">
        <li class="k-item k-state-default" onmouseover="$(this).addClass('k-state-hover')"
            onmouseout="$(this).removeClass('k-state-hover')">
            <span>
                <img src="#:poster#" />
                <h5>#:title#</h5>
            </span>
        </li>
    </script>
    <style>
        .k-mediaplayer {
            float: left;
            box-sizing: border-box;
            width: 70%;
        }

        .playlist {
            float: left;
            height: 360px;
            overflow: auto;
            width: 30%;
        }
        media(max-width: 800px)
        {
        .playlist,
        .k-mediaplayer {
            width: 100%;
        }}

            .playlist ul, .playlist li {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }

            .playlist .k-item {
                border-bottom-style: solid;
                border-bottom-width: 1px;
                padding: 14px 15px;
            }

                .playlist .k-item:last-child {
                    border-bottom-width: 0;
                }

            .playlist span {
                cursor: pointer;
                display: block;
                overflow: hidden;
                text-decoration: none;
            }

                .playlist span img {
                    border: 0 none;
                    display: block;
                    height: 56px;
                    object-fit: cover;
                    width: 100px;
                    float: left;
                }

            .playlist h5 {
                display: block;
                font-weight: normal;
                margin: 0;
                overflow: hidden;
                padding-left: 10px;
                text-align: left;
            }
    </style>
</div>
@endsection