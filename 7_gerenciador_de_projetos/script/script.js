// JavaScript para controlar o pop-up
var modal = document.getElementById("addModal");
var btn = document.getElementById("addBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function () {
  modal.style.display = "block";
};

span.onclick = function () {
  modal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

// Máscara de dinheiro no formato brasileiro com prefixo R$
function mascaraDinheiro(input) {
  let valor = input.value.replace(/\D/g, ""); // Remove caracteres não numéricos
  valor = (valor / 100).toFixed(2) + ""; // Converte para formato de moeda
  valor = valor.replace(".", ","); // Substitui o ponto por vírgula
  valor = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."); // Adiciona os pontos de milhar
  input.value = "R$ " + valor; // Define o valor formatado no campo
}
