@extends("layout/kendo")
@section('body')
             <div id="example">
                <div class="demo-section k-content" style="text-align: center;">
             <h4>Pick a date</h4>
             <div id="calendar"></div>
        </div>
            <script>
                $(document).ready(function() {
                    // create Calendar from div HTML element
                    $("#calendar").kendoCalendar();
                });
            </script>
        </div>
@endsection