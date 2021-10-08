$(function() {
    $('input[name="daterange"]').daterangepicker({
      open: 'left'
    }, function(start, end) {
      console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
    });
  });