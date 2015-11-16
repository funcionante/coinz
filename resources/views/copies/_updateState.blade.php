<script>

    function updateState() {
        var state = document.getElementById('state').value;
        var display = document.getElementById('state-display');

        switch(parseInt(state)) {
            case -1:
                display.innerHTML = 'Sem classificação';
                break;
            case 0:
                display.innerHTML = '<b>(0) Básico:</b> Disco metálico vagamente reconhecível como algo que já foi uma moeda, mas tão desgastada que o desenho já desapareceu.';
                break;
            case 1:
                display.innerHTML = '<b>(1) Fraco:</b> O desenho original é pouco aparente. A moeda é provavelmente impossível de identificar.';
                break;
            case 2:
                display.innerHTML = '<b>(2) Razoável:</b> A moeda está fortemente desgastada, mas alguns detalhes são reconhecíveis, permitindo uma identificação da moeda.';
                break;
            case 3:
                display.innerHTML = '<b>(3) Bom:</b> A moeda está danificada ou bastante desgastada, mas os desenhos são visíveis. Se a moeda não estiver usada mas tiver sido danificada ou dobrada, como é o caso de quando apresenta um corte profundo feito por uma lâmina, o seu estado será considerado "bom" na melhor das hipóteses.';
                break;
            case 4:
                display.innerHTML = '<b>(4) Muito Bom:</b> A moeda encontra-se bastante desgastada, mas com as principais inscrições bem legíveis, contrastando com as moedas que se encontram no estado anterior, em que as inscrições estão desvanecidas ou distorcidas em alguns locais.';
                break;
            case 5:
                display.innerHTML = '<b>(5) Excelente: </b> A moeda está desgastada em aproximadamente 50% dos detalhes, mas as inscrições mais pequenas ainda são visíveis.';
                break;
            case 6:
                display.innerHTML = '<b>(6) Excelente+: </b> Todos os principais detalhes são claramente nítidos. Moedas com retratos mostram alguns detalhes do cabelo. Pelo menos 75% da moeda original está conservada.';
                break;
            case 7:
                display.innerHTML = '<b>(7) Excelente++:</b> A moeda mantém algum do seu brilho original. Moedas com retratos revelam grandes detalhes no cabelo, tais como os fios do cabelo, embora alguns relevos mais altos estejam parcialmente desgastos. 95% do desenho original está conservado, sem qualquer desgaste.';
                break;
            case 8:
                display.innerHTML = '<b>(8) Quase não circulada:</b> Mais de 95% do desenho original está presente, mas apresenta um muito ligeiro desgaste. A moeda mantém pelo menos 50% do seu brilho original.';
                break;
            case 9:
                display.innerHTML = '<b>(9) Não circulada:</b> Todos os detalhes da moeda estão conservados. Não há qualquer desgaste no desenho. Pode estar presente alguma pequena marca ou arranhão. A moeda mantém todo o seu brilho original.';
                break;
            case 10:
                display.innerHTML = '<b>(10) "Fleur-de-coin":</b> A moeda é perfeita, tal como quando foi cunhada. Por exemplo, uma moeda ainda encapsulada. Apresenta todo o brilho original, sem arranhões ou qualquer outro dano e sem qualquer tipo de desgaste.';
                break;
            default:
                display.innerHTML = state;
                break;
        }
    }

</script>