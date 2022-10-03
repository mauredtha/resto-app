/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function () {
  "use strict";
  // ==============================================================
  // Newsletter
  // ==============================================================

  var cData = JSON.parse(`<?php echo $chart_data; ?>`);

  var chart2 = new Chartist.Bar(
    ".amp-pxl",
    {
      labels: cData.label,
      series: [
        cData.data
      ],
    },
    {
      axisX: {
        // On the x-axis start means top and end means bottom
        position: "end",
        showGrid: false,
      },
      axisY: {
        // On the y-axis start means left and end means right
        position: "start",
      },
      high: "50",
      low: "0",
      plugins: [Chartist.plugins.tooltip()],
    }
  );

  var chart = [chart2];
});
