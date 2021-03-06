@extends("layout/kendo")
@section('body')
 
        <div id="example">
                <ul id="panelbar">
                <li class="k-state-active">
                    <span class="k-link k-state-selected">My Teammates</span>
                    <div style="padding: 10px;">
                        <div class="teamMate">
                            <img src="kendo/content/web/panelbar/andrew.jpg" alt="Andrew Fuller">
                            <div class="details">
                                <h2>Andrew Fuller</h2>
                                <p>Team Lead</p>
                            </div>
                        </div>
                        <div class="teamMate">
                            <img src="kendo/content/web/panelbar/nancy.jpg" alt="Nancy Leverling">
                            <div class="details">
                                <h2>Nancy Leverling</h2>
                                <p>Sales Associate</p>
                            </div>
                        </div>
                        <div class="teamMate">
                            <img src="kendo/content/web/panelbar/robert.jpg" alt="Robert King">
                            <div class="details">
                                <h2>Robert King</h2>
                                <p>Business System Analyst</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    Projects
                    <ul>
                        <li>New Business Plan</li>
                        <li>
                            Sales Forecasts
                            <ul>
                                <li>Q1 Forecast</li>
                                <li>Q2 Forecast</li>
                                <li>Q3 Forecast</li>
                                <li>Q4 Forecast</li>
                            </ul>
                        </li>
                        <li>Sales Reports</li>
                    </ul>

                </li>
                <li>
                    Programs
                    <ul>
                        <li>Monday</li>
                        <li>Tuesday</li>
                        <li>Wednesday</li>
                        <li>Thursday</li>
                        <li>Friday</li>
                    </ul>
                </li>
                <li disabled="disabled">
                    Communication
                </li>
            </ul>
            <style>
                #panelbar {
                    max-width: 400px;
                    margin: 0 auto;
                }                
                .teamMate h2 {
                    font-size: 1.4em;
                    font-weight: normal;
                    padding-top: 20px;
                }
                .teamMate p {
                    margin: 0;
                }
                .teamMate img {
                    display: inline-block;
                    margin: 5px 15px 5px 5px;
                    border: 1px solid #ccc;
                    border-radius: 50%;
                }
                .details {
                    display: inline-block;
                    vertical-align: top;
                }
            </style>
            <script>
                $(document).ready(function() {
                    $("#panelbar").kendoPanelBar({
                        expandMode: "single"
                    });
                });
            </script>
        </div>

@endsection