@extends("layout/kendo")
@section('body')  
<div id="example">
    <div class="demo-section hidden-on-narrow k-content">
        <div id="scrollview"></div>
        <a id="prev-img" title="Previous Image"></a>
        <a id="next-img" title="Next Image"></a>
        <p>Photos via <a href="http://www.500px.com">500px.com</a></p>
    </div>
    
    <div class="responsive-message"></div>
</div>

<script id="template" type="text/x-kendo-template">
    <div>
        <div class="image" style="background-image: url(#: image_url #);"></div>
        <p class="title">#: name #</p>
    </div>
</script>

<script src="kendo/content/spa/aeroviewr/js/500px.js"></script>

<script>
    $(function() {
        _500px.init({
            sdk_key: 'a3be03a8a98d6e05af17f60d2cf4bf696eb47555'
        });

        var _500pxDS = new kendo.data.DataSource({
            transport: {
                read: function(options) {
                    var params = {
                        feature: "popular",
                        only: "Nature",
                        image_size: 4,
                        page: options.data.page,
                        rpp: options.data.pageSize
                    };

                    _500px.api("/photos", params, function(response) {
                        options.success(response.data);
                    });
                }
            },
            serverPaging: true,
            pageSize: 30,
            schema: {
                data: "photos",
                total: "total_items"
            }
        });

        $("#scrollview").kendoMobileScrollView({
            dataSource: _500pxDS,
            contentHeight: "440px",
            enablePager: false,
            template: kendo.template($("#template").html())
        });

        $("#prev-img").click(function(e) {
            var scrollView = $("#scrollview").data("kendoMobileScrollView");
            scrollView.prev();
        });

        $("#next-img").click(function(e) {
            var scrollView = $("#scrollview").data("kendoMobileScrollView");
            scrollView.next();
        });
    });
</script>

<style>
    .demo-section {
        position: relative;
    }
    .demo-section > p {
        text-align: right;
        margin-top: 10px;
        font-size: .8em;
    }
    #prev-img,
    #next-img {
        display: block;
        position: absolute;
        top: 42px;
        z-idex: 1;
        height: 400px;
        width: 100px;
        opacity: 0.2;
    }
    #prev-img {
        left: 42px;
        background: url('kendo/content/web/scrollview/arrow-left.png') no-repeat 50% 50%;
    }
    #next-img {
        left: auto;
        right: 42px;
        background: url('kendo/content/web/scrollview/arrow-right.png') no-repeat 50% 50%;
    }
    a#prev-img:hover {
        background: url('kendo/content/web/scrollview/arrow-left.png') no-repeat 50% 50% rgba(0,0,0,.3);
        opacity: 1;
    }
    a#next-img:hover  {
        background: url('kendo/content/web/scrollview/arrow-right.png') no-repeat 50% 50% rgba(0,0,0,.3);
        opacity: 1;
    }
    .title {
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        margin: 0;
        padding: 1em;
        background-color: #222;
        color: #fff;
    }
    .image {
        display: block;
        height: 400px;
        width: 400px;
        background-size: cover;
    }
</style>
@endsection