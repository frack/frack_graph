$(document).ready(function(){
    var mon = $('#day1').html(),
        tue = $('#day2').html(),
        wed = $('#day3').html(),
        thu = $('#day4').html(),
        fri = $('#day5').html(),
        sat = $('#day6').html(),
        sun = $('#day7').html(),
        wee = $('#week0').html(),
        max = Math.max.apply(Math, wee.split(",")) + 5;

    while(max % 25 != 0)
    {
        max++;
    }

    function createPlot(day, data)
    {
        var ticks = ['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23'];
        var plotMon = $.jqplot(day, data, {
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                rendererOptions: {
                    fillToZero: true,
                    barPadding: 0,
                    barMargin: 0
                },
            },
            legend: {
                show: false
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks,
                    pad: 1.2,
                    tickOptions: {
                        showGridline: false,
                        showMark: false
                    }
                },
                yaxis: {
                    autoscale: false,
                    min: 0,
                    max: max,
                    tickOptions: {
                        formatString: '%d'
                    }
                }
            }
        });
    }

    createPlot('Monday', [mon.split(",")]);
    createPlot('Tuesday', [tue.split(",")]);
    createPlot('Wednesday', [wed.split(",")]);
    createPlot('Thursday', [thu.split(",")]);
    createPlot('Friday', [fri.split(",")]);
    createPlot('Saturday', [sat.split(",")]);
    createPlot('Sunday', [sun.split(",")]);


    var days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
    
    var ticks = [];
    var j = 0;
    for(i = 1; i <= 168; i++) {
        if((i+12) % 24 == 0) {
            ticks.push(days[j]);
            j++;
        }
        else {
            ticks.push('');
        }
    }
    
    var plotMon = $.jqplot('Week', [wee.split(",")], {
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {
                fillToZero: true,
                barPadding: 0,
                barMargin: 0
            },
        },
        legend: {
            show: false
        },
        axes: {
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: ticks,
                pad: 1.2,
                tickOptions: {
                    showGridline: false,
                    showMark: false
                }
            },
            yaxis: {
                autoscale: false,
                min: 0,
                max: max,
                tickOptions: {
                    formatString: '%d'
                }
            }
        }
    });
});
