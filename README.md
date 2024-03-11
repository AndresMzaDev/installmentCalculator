[![Captura-de-pantalla-2024-02-26-a-la-s-08-19-09.png](https://i.postimg.cc/BvQsQGMK/Captura-de-pantalla-2024-02-26-a-la-s-08-19-09.png)](https://postimg.cc/HrKFBFGY)


# Calculadora Prestamo


Esta es una app sencilla, para calcular la cuota mensual en prestamos, solo ingresas los datos del prestamo y calculas, asi de facil 





## Tech Stack

**Client:** <a href="https://vuejs.org/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/vuejs/vuejs-original-wordmark.svg" alt="vuejs" width="40" height="40"/> </a> ,  <a href="https://tailwindcss.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg" alt="tailwind" width="40" height="40"/> </a>  



## Authors

- [@ndresMeza](https://www.linkedin.com/in/andres-meza-dev/)


## FAQ


#### What type of architecture is it made with?

Se implementa una arquitectura MVC, donde el modulo controlador del frontend esta limitado por VUE3


## Documentation

[Documentation](https://linktodocumentation)


## Usage/Examples
el backend esta hecho en php se espera un metodo POST que recibe 3 datos(Saldo de prestamo, Tasa de interes y Tiempo del prestamo), este metodo procede a tomar esos datos y procesarlos con la formula de calculo de cuota de prestamo. 

[![Captura-de-pantalla-2024-02-26-a-la-s-08-38-12.png](https://i.postimg.cc/zvTNdwJC/Captura-de-pantalla-2024-02-26-a-la-s-08-38-12.png)](https://postimg.cc/Wqpxzkqz)

donde P es la cantidad del prestamo, r es la tasa de interés mensual (tasa anual dividida por 12 y dividida por 100 para convertirla en decimal) y n es la cantidad de mese

```php
<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    // verificando datos recibidos

    if (isset($_POST['amount']) && isset($_POST['interestRate']) && isset($_POST['paymentTime'])) {
        $amount = $_POST['amount'];
        $interestRate = $_POST['interestRate'];
        $paymentTime = $_POST['paymentTime'];
        // sacamos el porcentaje por mes
        $numberPorcen = $interestRate/100;
        $interestMonth = ($numberPorcen/12);
        
        if (is_numeric($amount) && is_numeric($interestRate) && is_numeric($paymentTime)) {
            $result = ($amount * $interestMonth * pow((1 + $interestMonth), $paymentTime))/(pow((1+$interestMonth),$paymentTime)-1) ;
            // $suma = $amount + $interestRate + $paymentTime;
            
            // Devolvemos el producto como respuesta
            echo json_encode(array('result' =>  round( $result, 2) ));
        } else {
            echo json_encode(array('error' => 'Los datos deben ser numéricos'));
        }
    } else {
        echo json_encode(array('error' => 'Se esperaban tres datos'));
    }
} else {
    echo json_encode(array('error' => 'Se esperaba una solicitud POST'));
}
?>

```


## Installation

Install installmentCalculator with npm

```bash
  npm install installmentCalculator
  cd installmentCalculator
  npm run dev
```
se utiliza en el frontend vite, vue3 y tailwind.
en el backend se usa PHP y Mamp para correr el servidor 


# My name is Andres Meza, developer and designer, you can see more of my work at: 👋

[![portfolio](https://img.shields.io/badge/my_portfolio-86a8cf?style=for-the-badge&logo=ko-fi&logoColor=white)](https://andresmza.com/)
[![figma](https://img.shields.io/badge/figma-FF4525?style=for-the-badge&logo=figma&logoColor=white)](https://lnkd.in/e3qPT5sh)
[![github](https://img.shields.io/badge/GitHub-000000?style=for-the-badge&logo=gitHub&logoColor=white)](https://github.com/AndresMzaDev)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/andres-meza-dev/)
[![dribbble](https://img.shields.io/badge/dribbble-f0467c?style=for-the-badge&logo=dribbble&logoColor=white)](https://lnkd.in/ea5rJx25)
[![portfolio](https://img.shields.io/badge/my_portfolio-86a8cf?style=for-the-badge&logo=ko-fi&logoColor=white)](https://andresmza.com/)
[![figma](https://img.shields.io/badge/figma-FF4525?style=for-the-badge&logo=figma&logoColor=white)](https://lnkd.in/e3qPT5sh)
[![github](https://img.shields.io/badge/GitHub-000000?style=for-the-badge&logo=gitHub&logoColor=white)](https://github.com/AndresMzaDev)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/andres-meza-dev/)
[![dribbble](https://img.shields.io/badge/dribbble-f0467c?style=for-the-badge&logo=dribbble&logoColor=white)](https://lnkd.in/ea5rJx25)
[![portfolio](https://img.shields.io/badge/my_portfolio-86a8cf?style=for-the-badge&logo=ko-fi&logoColor=white)](https://andresmza.com/)
[![figma](https://img.shields.io/badge/figma-FF4525?style=for-the-badge&logo=figma&logoColor=white)](https://lnkd.in/e3qPT5sh)
[![github](https://img.shields.io/badge/GitHub-000000?style=for-the-badge&logo=gitHub&logoColor=white)](https://github.com/AndresMzaDev)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/andres-meza-dev/)
[![dribbble](https://img.shields.io/badge/dribbble-f0467c?style=for-the-badge&logo=dribbble&logoColor=white)](https://lnkd.in/ea5rJx25)
[![portfolio](https://img.shields.io/badge/my_portfolio-86a8cf?style=for-the-badge&logo=ko-fi&logoColor=white)](https://andresmza.com/)
