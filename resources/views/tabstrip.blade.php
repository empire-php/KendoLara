@extends("layout/kendo")
@section('body')
<div id="example">
                <div class="demo-section k-content">
                        <div id="tabstrip">
                            <ul>
                                <li class="k-state-active">
                                    Paris
                                </li>
                                <li>
                                    New York
                                </li>
                                <li>
                                    London
                                </li>
                                <li>
                                    Moscow
                                </li>
                            </ul>
                            <div>
                                <span class="rainy">&nbsp;</span>
                                <div class="weather">
                                    <h2>17<span>&ordm;C</span></h2>
                                    <p>Rainy weather in Paris.</p>
                                </div>
                            </div>
                            <div>
                                <span class="sunny">&nbsp;</span>
                                <div class="weather">
                                    <h2>29<span>&ordm;C</span></h2>
                                    <p>Sunny weather in New York.</p>
                                </div>
                            </div>
                            <div>
                                <span class="sunny">&nbsp;</span>
                                <div class="weather">
                                    <h2>21<span>&ordm;C</span></h2>
                                    <p>Sunny weather in London.</p>
                                </div>
                            </div>
                            <div>
                                <span class="cloudy">&nbsp;</span>
                                <div class="weather">
                                    <h2>16<span>&ordm;C</span></h2>
                                    <p>Cloudy weather in Moscow.</p>
                                </div>
                            </div>
                        </div>
                </div>

            <style>
                .sunny, .cloudy, .rainy {
                    display: block;
                    margin: 30px auto 10px;
                    width: 128px;
                    height: 128px;
                    background: url('kendo/content/web/tabstrip/weather.png') transparent no-repeat 0 0;
                }

                .cloudy{
                    background-position: -128px 0;
                }

                .rainy{
                    background-position: -256px 0;
                }

                .weather {
                    margin: 0 auto 30px;
                    text-align: center;
                }

                #tabstrip h2 {
                    font-weight: lighter;
                    font-size: 5em;
                    line-height: 1;
                    padding: 0 0 0 30px;
                    margin: 0;
                }

                #tabstrip h2 span {
                    background: none;
                    padding-left: 5px;
                    font-size: .3em;
                    vertical-align: top;
                }

                #tabstrip p {
                    margin: 0;
                    padding: 0;
                }
            </style>

            <script>
                $(document).ready(function() {
                    $("#tabstrip").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
            </script>
        </div>

@endsection