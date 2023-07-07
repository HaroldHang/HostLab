/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
let totEchant
let totEchantNon
window.addEventListener("load" , ()=> {
  
})
totEchant = document.getElementById("totalEchant").value;
totEchantNon = document.getElementById("totalEchantNon").value;
//console.log(totEchant);
const pieConfig = {
  type: 'doughnut',
  data: {
    datasets: [
      {
        data: [totEchantNon, totEchant-totEchantNon],
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: ['#065F46', '#34D399',],
        label: 'Dataset 1',
      },
    ],
    labels: ['Analyses Echantillons En cours', 'Analyses Echantillons Termine'],
  },
  options: {
    responsive: true,
    cutoutPercentage: 80,
    /**
     * Default legends are ugly and impossible to style.
     * See examples in charts.html to add your own legends
     *  */
    legend: {
      display: false,
    },
  },
}

// change this to the id of your chart element in HMTL
const pieCtx = document.getElementById('pie')
window.myPie = new Chart(pieCtx, pieConfig)

let totDemande = document.getElementById("totalDemande").value;
let totDemandeNon = document.getElementById("totalDemandeNon").value;
const pieConfig2 = {
  type: 'doughnut',
  data: {
    datasets: [
      {
        data: [totDemandeNon, totDemande - totDemandeNon],
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: ['#065F46', '#34D399',],
        label: 'Dataset 1',
      },
    ],
    labels: ['Patient non pris en charge', 'Patient pris en charge'],
  },
  options: {
    responsive: true,
    cutoutPercentage: 80,
    /**
     * Default legends are ugly and impossible to style.
     * See examples in charts.html to add your own legends
     *  */
    legend: {
      display: false,
    },
  },
}

const pieCtx2 = document.getElementById('pie1')
window.myPie = new Chart(pieCtx2, pieConfig2)