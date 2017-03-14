@extends("layout/kendo")
@section('body')    
    <div id="example">
 
    <div class="box wide hidden-on-narrow">
        <h4>Export page content</h4>
        <div class="box-col">
            <button class='export-pdf k-button'>Export as PDF</button>
        </div>
        <div class="box-col">
            <button class='export-img k-button'>Export as Image</button>
        </div>
        <div class="box-col">
            <button class='export-svg k-button'>Export as SVG</button>
        </div>
    </div>

    <div class="demo-section k-content export-app wide hidden-on-narrow">
        <div class="demo-section content-wrapper wide">
          <div class="demo-section charts-wrapper wide">
            <div id="users"></div>
            <div id="applications"></div>
            <div id="referrals"></div>
          </div>
          <div id="grid"></div>
        </div>
    </div>
    
    <div class="responsive-message"></div>
</div>

<style>
    /*
        Use the DejaVu Sans font for display and embedding in the PDF file.
        The standard PDF fonts have no support for Unicode characters.
    */
    .k-widget {
        font-family: "DejaVu Sans", "Arial", sans-serif;
        font-size: .9em;
    }
</style>

<script>
    // Import DejaVu Sans font for embedding

    // NOTE: Only required if the Kendo UI stylesheets are loaded
    // from a different origin, e.g. cdn.kendostatic.com
    kendo.pdf.defineFont({
        "DejaVu Sans"             : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans.ttf",
        "DejaVu Sans|Bold"        : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Bold.ttf",
        "DejaVu Sans|Bold|Italic" : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
        "DejaVu Sans|Italic"      : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf"
    });
</script>

<!-- Load Pako ZLIB library to enable PDF compression -->
<script src="@Url.Script("pako_deflate.min.js")"></script>

<script>
$(document).ready(function() {

    $(".export-pdf").click(function() {
        // Convert the DOM element to a drawing using kendo.drawing.drawDOM
        kendo.drawing.drawDOM($(".content-wrapper"))
        .then(function(group) {
            // Render the result as a PDF file
            return kendo.drawing.exportPDF(group, {
                paperSize: "auto",
                margin: { left: "1cm", top: "1cm", right: "1cm", bottom: "1cm" }
            });
        })
        .done(function(data) {
            // Save the PDF file
            kendo.saveAs({
                dataURI: data,
                fileName: "HR-Dashboard.pdf",
                proxyURL: "https://demos.telerik.com/kendo-ui/service/export"
            });
        });
    });

    $(".export-img").click(function() {
        // Convert the DOM element to a drawing using kendo.drawing.drawDOM
        kendo.drawing.drawDOM($(".content-wrapper"))
        .then(function(group) {
            // Render the result as a PNG image
            return kendo.drawing.exportImage(group);
        })
        .done(function(data) {
            // Save the image file
            kendo.saveAs({
                dataURI: data,
                fileName: "HR-Dashboard.png",
                proxyURL: "https://demos.telerik.com/kendo-ui/service/export"
            });
        });
    });

    $(".export-svg").click(function() {
        // Convert the DOM element to a drawing using kendo.drawing.drawDOM
        kendo.drawing.drawDOM($(".content-wrapper"))
        .then(function(group) {
            // Render the result as a SVG document
            return kendo.drawing.exportSVG(group);
        })
        .done(function(data) {
            // Save the SVG document
            kendo.saveAs({
                dataURI: data,
                fileName: "HR-Dashboard.svg",
                proxyURL: "https://demos.telerik.com/kendo-ui/service/export"
            });
        });
    });


    var data = [{
      "source": "Approved",
      "percentage": 237
    }, {
      "source": "Rejected",
      "percentage": 112
    }];

    var refs = [{
      "source": "Dev",
      "percentage": 42
    }, {
      "source": "Sales",
      "percentage": 18
    }, {
      "source": "Finance",
      "percentage": 29
    }, {
      "source": "Legal",
      "percentage": 11
    }];

    $("#applications").kendoChart({
      legend: {
        position: "bottom"
      },
      dataSource: {
        data: data
      },
      series: [{
        type: "donut",
        field: "percentage",
        categoryField: "source"
      }],
      chartArea: {
          background: "none"
      },
      tooltip: {
        visible: true,
        template: "${ category } - ${ value } applications"
      }
    });

    $("#users").kendoChart({
        legend: {
            visible: false
        },
        seriesDefaults: {
            type: "column"
        },
        series: [{
            name: "Users Reached",
            data: [340, 894, 1345, 1012, 3043, 2013, 2561, 2018, 2435, 3012]
        }, {
            name: "Applications",
            data: [50, 80, 120, 203, 324, 297, 176, 354, 401, 349]
        }],
        valueAxis: {
            labels: {
                visible: false
            },
            line: {
                visible: false
            },
            majorGridLines: {
                visible: false
            }
        },
        categoryAxis: {
            categories: [2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011],
            line: {
                visible: false
            },
            majorGridLines: {
                visible: false
            }
        },
        chartArea: {
            background: "none"
        },
        tooltip: {
            visible: true,
            format: "{0}",
            template: "#= series.name #: #= value #"
        }
    });

    $("#referrals").kendoChart({
      legend: {
        position: "bottom"
      },
      dataSource: {
        data: refs
      },
      series: [{
        type: "pie",
        field: "percentage",
        categoryField: "source"
      }],
      chartArea: {
          background: "none"
      },
      tooltip: {
        visible: true,
        template: "${ category } - ${ value }%"
      }
    });

    $("#grid").kendoGrid({
      dataSource: {
        type: "odata",
        transport: {
          read: "https://demos.telerik.com/kendo-ui/service/Northwind.svc/Customers"
        },
        pageSize: 15,
        group: { field: "ContactTitle" }
      },
      height: 450,
      groupable: true,
      sortable: true,
      selectable: "multiple",
      reorderable: true,
      resizable: true,
      filterable: true,
      pageable: {
        refresh: true,
        pageSizes: true,
        buttonCount: 5
      },
      columns: [
        {
          field: "ContactName",
          template: "<div class=\'customer-name\'>#: ContactName #</div>",
          title: "Contact",
          width: 200
        },{
          field: "ContactTitle",
          title: "Contact Title",
          width: 220
        },{
          field: "Phone",
          title: "Phone",
          width: 160
        },{
          field: "CompanyName",
          title: "Company Name"
        },{
          field: "City",
          title: "City",
          width: 160
        }
      ]
    });
   });
</script>

<style>
.export-app {
    display: table;
    width: 100%;
    height: 750px;
    padding: 0;
}

.export-app .demo-section {
    margin: 0 auto;
    border: 0;
}

.content-wrapper {
    display: table-cell;
    vertical-align: top;
}

.charts-wrapper {
    height: 250px;
    padding: 0 0 20px;
}

#applications,
#users,
#referrals {
    display: inline-block;
    width: 50%;
    height: 240px;
    vertical-align: top;
}
#applications,
#referrals {
    width: 24%;
    height: 250px;
}

.customer-photo {
    display: inline-block;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-size: 40px 44px;
    background-position: center center;
    vertical-align: middle;
    line-height: 41px;
    box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
}
.customer-name {
    display: inline-block;
    vertical-align: middle;
    line-height: 41px;
    padding-left: 10px;
}
</style>

@endsection