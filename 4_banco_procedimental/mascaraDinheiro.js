document.addEventListener("DOMContentLoaded", function () {
    const precoInput = document.querySelector('input[name="txtPreco"]');

    if (precoInput) {
        precoInput.addEventListener("input", function () {
            let value = precoInput.value;

            // Remove caracteres não numéricos (exceto vírgula e ponto)
            value = value.replace(/[^\d.,]/g, "");

            // Substituir vírgula por ponto para padronizar
            value = value.replace(",", ".");

            // Garantir que é um número e formatar para duas casas decimais
            const numericValue = parseFloat(value);
            if (!isNaN(numericValue)) {
                precoInput.value = numericValue.toLocaleString("pt-BR", {
                    style: "decimal",
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });
            } else {
                precoInput.value = "";
            }
        });
    }
});
