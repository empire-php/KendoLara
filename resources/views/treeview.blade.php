@extends("layout/kendo")
@section('body')
        <div id="example">
            <div class="demo-section k-content">
                <ul id="treeview">
                    <li data-expanded="true">
                        <span class="k-sprite folder"></span>
                        My Web Site
                        <ul>
                            <li data-expanded="true">
                                <span class="k-sprite folder"></span>images
                                <ul>
                                    <li><span class="k-sprite image"></span>logo.png</li>
                                    <li><span class="k-sprite image"></span>body-back.png</li>
                                    <li><span class="k-sprite image"></span>my-photo.jpg</li>
                                </ul>
                            </li>
                            <li data-expanded="true">
                                <span class="k-sprite folder"></span>resources
                                <ul>
                                    <li data-expanded="true">
                                        <span class="k-sprite folder"></span>pdf
                                        <ul>
                                            <li><span class="k-sprite pdf"></span>brochure.pdf</li>
                                            <li><span class="k-sprite pdf"></span>prices.pdf</li>
                                        </ul>
                                    </li>
                                    <li><span class="k-sprite folder"></span>zip</li>
                                </ul>
                            </li>
                            <li><span class="k-sprite html"></span>about.html</li>
                            <li><span class="k-sprite html"></span>contacts.html</li>
                            <li><span class="k-sprite html"></span>index.html</li>
                            <li><span class="k-sprite html"></span>portfolio.html</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <script>
                $(document).ready(function() {
                    $("#treeview").kendoTreeView();
                });
            </script>

            <style>
                #treeview .k-sprite {
                    background-image: url("{{ url('kendo/content/web/treeview/coloricons-sprite.png')}}");
                }

                .rootfolder { background-position: 0 0; }
                .folder { background-position: 0 -16px; }
                .pdf { background-position: 0 -32px; }
                .html { background-position: 0 -48px; }
                .image { background-position: 0 -64px; }
            </style>
        </div>
    
@endsection