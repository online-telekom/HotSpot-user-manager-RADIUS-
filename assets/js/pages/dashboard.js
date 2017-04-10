$( document ).ready(function() {
    
  //  setTimeout(function(){ Materialize.toast('Welcome to Alpha!', 4000) }, 4000);
//setTimeout(function(){ Materialize.toast('You have 4 new notifications', 4000) }, 11000);
    
    
    
    // CounterUp Plugin
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
    
    // Peity Chart
    $.fn.peity.defaults.pie = {
        delimiter: null,
        fill: ["#26A69A", "#e0e0e0", "#b2dfdb"],
        height: null,
        radius: 8,
        width: null
    };
    $("span.pie").peity("pie")
    
    // Radar Chart
    var ctx3 = document.getElementById("radar-chart").getContext("2d");
    var data3 = {
        labels: ["Eat", "Drink", "Sleep", "Work", "Code", "Cycle", "Run"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(241,202,58,0.2)",
                strokeColor: "#F1CA3A",
                pointColor: "#F1CA3A",
                data: [65, 59, 90, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(83,168,251,0.2)",
                strokeColor: "#53A8FB",
                pointColor: "#53A8FB",
                data: [28, 48, 40, 19, 96, 27, 100]
            }
        ]
    };

    var myRadarChart = new Chart(ctx3).Radar(data3, {
        scaleShowLine : true,
        angleShowLineOut : true,
        scaleShowLabels : false,
        scaleBeginAtZero : true,
        angleLineColor : "rgba(0,0,0,.1)",
        angleLineWidth : 1,
        pointLabelFontFamily : "'Arial'",
        pointLabelFontStyle : "normal",
        pointLabelFontSize : 10,
        pointLabelFontColor : "#666",
        pointDot : false,
        pointDotRadius : 3,
        pointDotStrokeWidth : 1,
        pointHitDetectionRadius : 20,
        datasetStroke : true,
        datasetStrokeWidth : 2,
        datasetFill : true,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true,
        tooltipCornerRadius: 2,
        scaleOverride: true,
        scaleSteps: 6,
        scaleStepWidth: 15,
        scaleStartValue: 0,
    });
    
    
    var DrawSparkline = function() {
        
        var linePoints = [0, 1, 3, 2, 1, 1, 4, 1, 2, 0, 3, 1, 3, 4, 1, 0, 2, 3, 6, 3, 4, 2, 7, 5, 2, 4, 1, 2, 6, 13, 4, 2];
        $('#sparkline-line').sparkline(linePoints, {
            type: 'line',
            width: 'calc(100% + 4px)',
            height: '45',
            chartRangeMax: 13,
            lineColor: '#ffb74d',
            fillColor: 'rgba(255,183,77,0.3)',
            highlightLineColor: 'rgba(0,0,0,0)',
            highlightSpotColor: 'rgba(0,0,0,.2)',
            tooltip: false
        });
        
        var barParent = $('#sparkline-bar').closest('.card');
        var barPoints = [0, 1, 3, 2, 1, 1, 4, 1, 2, 0, 3, 1, 3, 4, 1, 0, 2, 3, 6, 3, 4, 2, 7, 5, 2, 4, 1, 2, 6, 13, 4, 2];
        var barWidth = 6;
        $('#sparkline-bar').sparkline(barPoints, {
            type: 'bar',
            height: $('#sparkline-bar').height() + 'px',
            width: '100%',
            barWidth: barWidth,
            barSpacing: (barParent.width() - (barPoints.length * barWidth)) / barPoints.length,
            barColor: 'rgba(0,0,0,.07)',
            tooltipFormat: ' <span style="color: #ccc">&#9679;</span> {{value}}</span>'
        });
        
    };
    
    DrawSparkline();
    
    var resizeChart;

    $(window).resize(function(e) {
        clearTimeout(resizeChart);
        resizeChart = setTimeout(function() {
            DrawSparkline();
        }, 300);
    });
    
   

    
    $(document).on("fixedSidebarClick", function() {
        clearTimeout(resizeChart);
        resizeChart = setTimeout(function() {
            DrawSparkline();
        }, 300);
    });
});