$(document).ready(function(){
$.ajax({
    url: "http://localhost/Artchive/Question1Data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var year = [];
      var count = [];
      var medium = [];

      for (var i in data) {
        year.push([data[i].OBJECTENDDATE, data[i].MEDIUM]);
        count.push(data[i].COUNT);
      }

      var chartdata = {
        labels: year,
        datasets : [
          {
            label: "Count",
            backgroundColor: "rgba(255, 0, 0, 0.75)",
            borderColor: "rgba(200, 200, 200, 0.75)",
            hoverBackgroundColor: "rgba(200, 200, 200, 1)",
            hoverBorderColor: "rgba(200, 200, 200, 1)",
            data: count
          }
        ]
      };

      var ctx = $('#mycanvas');
      var barGraph = new Chart(ctx, {type: 'bar', data: chartdata,
      options: {
      plugins: {
        title: {display: true, text: 'Most popular medium by year'}
      }
   }});
    },
    error: function(data) {
      console.log(data);
    }
  });
});
