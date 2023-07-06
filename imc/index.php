<div>
    <p>O seu IMC está na faixa de:
        <b>
            <?php 

            $altura = 1.80;
            $peso = 80;
            $imc = $peso / ($altura * $altura);

            $faixa = "";

            if($imc < 18.5){
                $faixa = "magreza";
            } else if($imc >= 18.5 && $imc < 25){
                $faixa = "Normal";
            } else if($imc >= 25 && $imc < 30){
                $faixa = "Sobrepeso";
            } else {
                $faixa = "Obesidade";
            }

            echo $faixa;
            ?>
        </b>
    </p>
</div>