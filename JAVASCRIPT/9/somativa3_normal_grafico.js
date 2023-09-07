var xvalues = [
  "Niassa",
  "Cabo Delgado",
  "Nampula",
  "Zambezia",
  "Tete",
  "Manica",
  "Sofala",
  "inhambane",
  "Gaza",
  "Maputo Provincia",
  "Maputo Cidade",
];

var yvalues = [
  3324, 4980, 7984, 5515, 4080, 3575, 6375, 4207, 3813, 6082, 9200,
];

var barColors = [
  "red",
  "green",
  "orange",
  "brown",
  "lime",
  "purple",
  "thistle",
  "gold",
  "red",
  "green",
  "black",
];

new Chart(myChart, {
  type: "bar",
  data: {
    labels: xvalues,
    datasets: [
      {
        backgroundColor: barColors,
        data: yvalues,
      },
    ],
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: "Tabela Salarial por setor de actividade",
    },
  },
});
