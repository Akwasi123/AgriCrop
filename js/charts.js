/* chart.js chart examples */

// chart colors
var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#e64a19'];
var colors2 = ['#f44336','#4a148c','#2e7d32','#c3e6cb','#dc3545','#6c757d'];

/* 3 donut charts */
var donutOptions = {
  cutoutPercentage: 85, 
  legend: {position:'bottom', padding:5, labels: {pointStyle:'circle', usePointStyle:true}}
};

// donut 1
var chDonutData1 = {
    labels: ['Dog', 'Goats', 'Sheep'],
    datasets: [
      {
        backgroundColor: colors2.slice(0,3),
        borderWidth: 0,
        data: [70, 11, 29]
      }
    ]
};

var chDonut1 = document.getElementsByClassName("chDonut1");
if (chDonut1) {
  new Chart(chDonut1, {
      type: 'pie',
      data: chDonutData1,
      options: donutOptions
  });
}

// donut 2
var chDonutData2 = {
    labels: ['Cows', 'Ox', 'Chicken'],
    datasets: [
      {
        backgroundColor: colors.slice(1,4),
        borderWidth: 0,
        data: [20, 45, 60]
      }
    ]
};
var chDonut2 = document.getElementsByClassName("chDonut2");
if (chDonut2) {
  new Chart(chDonut2, {
      type: 'pie',
      data: chDonutData2,
      options: donutOptions
  });
}

// donut 3
var chDonutData3 = {
    labels: ['Pig', 'Rabbit', 'Boar'],
    datasets: [
      {
        backgroundColor: colors.slice(2,6),
        borderWidth: 0,
        data: [21, 65, 55]
      }
    ]
};
var chDonut3 = document.getElementsByClassName("chDonut3");
if (chDonut3) {
  new Chart(chDonut3, {
      type: 'pie',
      data: chDonutData3,
      options: donutOptions
  });
}

// donut 4
var chDonutData4 = {
    labels: ['Rice', 'Millet', 'Maize'],
    datasets: [
      {
        backgroundColor: colors.slice(1,3),
        borderWidth: 0,
        data: [74, 11, 40]
      }
    ]
};

var chDonut4 = document.getElementsByClassName("chDonut4");
if (chDonut4) {
  new Chart(chDonut4, {
      type: 'pie',
      data: chDonutData4,
      options: donutOptions
  });
}

// donut 5
var chDonutData5 = {
    labels: ['Cassava', 'Plantain', 'Malt'],
    datasets: [
      {
        backgroundColor: colors2.slice(2,5),
        borderWidth: 0,
        data: [40, 45, 30]
      }
    ]
};
var chDonut5 = document.getElementsByClassName("chDonut5");
if (chDonut5) {
  new Chart(chDonut5, {
      type: 'pie',
      data: chDonutData5,
      options: donutOptions
  });
}

// donut 6
var chDonutData6 = {
    labels: ['Barley', 'Yam', 'Ginger'],
    datasets: [
      {
        backgroundColor: colors.slice(0,3),
        borderWidth: 0,
        data: [30, 45, 65]
      }
    ]
};
var chDonut6 = document.getElementsByClassName("chDonut6");
if (chDonut6) {
  new Chart(chDonut6, {
      type: 'pie',
      data: chDonutData6,
      options: donutOptions
  });
}

