const kayitOlButton = document.getElementById("kayitOlButton");
const girisYapButton = document.getElementById("girisYapButton");
const kayitPanel = document.getElementById("kayitPanel");
const girisPanel = document.getElementById("girisPanel");

kayitOlButton.addEventListener("click", function() {
    kayitPanel.style.display = "block";
    girisPanel.style.display = "none";
});

girisYapButton.addEventListener("click", function() {
    girisPanel.style.display = "block";
    kayitPanel.style.display = "none";
});
