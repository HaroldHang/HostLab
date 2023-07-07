
/* Demande Analyse script */

let resultsBtn = document.getElementsByClassName("result-btn");
let modalContent = document.getElementById("modal-content");
console.log(resultsBtn);
/*resultsBtn.forEach(resultBtn => {
    resultBtn.addEventListener("click", function() {
        let dataId = this.getAttribute("data-result");
        let dataResult = document.getElementById(dataId);
        modalContent.innerText = dataResult.value;
    })
});*/
 
for (let i = 0; i < resultsBtn.length; i++) {
    const resultBtn = resultsBtn[i];
    resultBtn.addEventListener("click", function() {
        let dataId = this.getAttribute("data-result");
        let patient = document.getElementsByClassName("patient_name")[i];
        let patientAge = document.getElementsByClassName("patient_age")[i];
        let patientName = patient.innerText
        let dataResult = document.getElementById(dataId);
        let dataName = document.getElementById("patient_id");
        let dataAge = document.getElementById("patient_year");
        dataName.innerText = patientName;
        dataAge.innerText = patientAge.innerText.trim();
        modalContent.innerHTML = dataResult.value;
    })
    
}