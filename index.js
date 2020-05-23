const today = new Date();
const date = today.toLocaleDateString();
var dateSelector = document.querySelectorAll(".date");
for (let i = 0;i<dateSelector.length;i++) {
    dateSelector[i].innerHTML=date;
}
