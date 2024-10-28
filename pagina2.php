<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miau Café & Espaço</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            transition: background-color 0.3s, color 0.3s;
        }

        header {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        header img.logo {
            width: 70px;
            position: absolute;
            top: 20px;
            left: 20px;
        }

        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
        }

        nav a {
            text-decoration: none;
            color: black;
            padding: 5px 15px;
            transition: border-bottom 0.3s, color 0.3s;
            border-bottom: 2px solid transparent;
            line-height: 40px;
        }

        nav a:hover,
        nav a.active {
            border-bottom: 2px solid orange;
            color: black;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: orange;
            min-width: 160px;
            border-radius: 5px;
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1c40f;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown > a {
            line-height: 40px;
            padding: 5px 15px;
            border-bottom: 2px solid transparent;
        }

        .dropdown:hover > a,
        .dropdown > a.active {
            border-bottom: 2px solid orange;
        }

        .top-right {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 15px;
        }

        .top-right img {
            width: 60px;
            cursor: pointer;
        }

        .banner-container {
            width: 100%;
            max-width: 1373px;
            margin: 20px auto;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .banner {
            background-image: url('imagemcanecas.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 15px;
            height: 400px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .section-cards {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            gap: 20px;
            max-width: 1373px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        .card {
            flex: 1;
            height: 700px;
            background-size: cover;
            background-position: center;
            border-radius: 15px;
            cursor: pointer;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card:nth-child(1) {
            background-image: url('containercomida1.png');
        }

        .card:nth-child(2) {
            background-image: url('containerbebida1.png');
        }

        .card:nth-child(3) {
            background-image: url('containercardapio1.png');
        }


        .horizontal-img-container {
            width: 1518px;
            height: 600px;
            background-color: #222;
            background-size: cover;
            background-position: center;
            background-image: url('experiencia.png');
            margin-top: 40px;
        }

        .carrossel {
            width: 60%;
            max-width: 400px;
            margin: 40px auto;
            position: relative;
        }

        .slides {
            display: flex;
            overflow: hidden;
        }

        .slide {
            min-width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .slide img {
            width: 250px;
            height: 250px;
            border-radius: 20px;
            object-fit: cover;
        }

        .carousel-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .carousel-controls button {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 10px;
        }

        .gatos-section {
            max-width: 1373px;
            margin: 50px auto;
            text-align: center;
        }

        .gatos-section h2 {
            font-size: 2em;
            color: orange;
            margin-bottom: 30px;
        }
        .h1{
            font-size: 2em;
            color: orange;
            margin-bottom: 30px;
        }
        

        .gato {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .gato:nth-child(odd) {
            flex-direction: row-reverse;
        }

        .gato img {
            width: 250px;
            height: 250px;
            border-radius: 15px;
            object-fit: cover;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .gato-text {
            max-width: 60%;
            text-align: left;
            padding-left: 20px;
        }

        .gato:nth-child(odd) .gato-text {
            padding-left: 0;
            padding-right: 20px;
        }

        .gato-text h3 {
            margin: 0;
            font-size: 1.8em;
        }

        .gato-text p {
            font-size: 1.1em;
            line-height: 1.6;
        }

        .gato-icon {
            width: 60px;
            height: 60px;
            margin-left: 20px;
        }

        .gato:nth-child(odd) .gato-icon {
            margin-right: 20px;
            margin-left: 0;
        }

        body.dark-mode {
            background-color: #222;
            color: white;
        }

        header.dark-mode {
            background-color: #333;
        }

        footer {
            background-color: #001f3f;
            text-align: center;
            padding: 20px;
            color: white;
        }

        footer img {
            width: 70px;
        }

        footer h3 {
            margin: 10px 0;
            font-size: 1.5em;
            font-weight: bold;
        }

        footer p {
            margin: 5px 0;
            font-size: 1.1em;
        }
       
.gato {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin-bottom: 40px;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
}

.gato img {
    width: 250px;
    height: 250px;
    border-radius: 15px;
    object-fit: cover;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin-right: 20px;
}

.gato:nth-child(odd) {
    flex-direction: row-reverse;
    justify-content: flex-start;
}

.gato:nth-child(odd) img {
    margin-left: 20px;
    margin-right: 0;
}

.gato-text {
    max-width: 60%;
    text-align: left;
}

.gato:nth-child(odd) .gato-text {
    text-align: right;
}

.gato-text h3 {
    margin: 0;
    font-size: 1.8em;
}

.gato-text p {
    font-size: 1.1em;
    line-height: 1.6;
}

#scrollTopBtn {
  display: none; 
  position: fixed;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 99;
  background-color: #555;
  border: none;
  outline: none;
  width: 60px;
  height: 60px;
  border-radius: 50%; 
  cursor: pointer;
  opacity: 0.7;
  transition: opacity 0.3s;
  padding: 0;
}

#scrollTopBtn img {
  width: 100%;
  height: 100%;
  border-radius: 50%; 
}

#scrollTopBtn:hover {
  background-color: #333;
  opacity: 1;
}

/* Dummy content styling */
.content {
  height: 1500px;
  text-align: center;
}

    </style>
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <img id="logo" src="logopreta.png" alt="Logo" class="logo">
        <nav>
            <a href="#" class="active">Home</a>
            <a href="#">Cardápio</a>
            <a href="#gatos">Gatos</a>
            <a href="cadastro.php">Logout</a>
        </nav>
        <div class="top-right">
            <img src="gato branco.png" alt="Tema Escuro" id="theme-toggle">
        </div>
    </header>

    <!-- Banner -->
    <div class="banner-container">
        <div class="banner"></div>
    </div>

    <!-- Seção de Cartões -->
    <div class="section-cards">
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
        </div>
    </div>

    <!-- Seção de Imagem Horizontal -->
    <div class="horizontal-img-container"></div>

    <!-- Carrossel -->
    <div class="gatos-section" id="gatos"> <center><h2>NOSSOS PRODUTOS</h2></center></div>
    <div class="carrossel">
        <div class="slides" id="carousel-slides">
            <div class="slide">
                
                <img src="camisa.png" alt="Gato 1">
            </div>
            <div class="slide">
                <img src="ecobag.png" alt="Gato 2">
            </div>
            <div class="slide">
                <img src="quadro.png" alt="Gato 3">
            </div>
        </div>
        <div class="carousel-controls">
            <button id="prev">Anterior</button>
            <button id="next">Próximo</button>
        </div>
    </div>

    <!-- Seção Nossos Gatos -->
    <div class="gatos-section" id="gatos">
        <h2>NOSSOS GATOS</h2>
        <div class="gato">
            <img src="marcia.png" alt="Gato 1">
            <div class="gato-text">
                <h3>MARCIA</h3>
                <p>Sim, o nome dela é Marcia, dorminhoca e brincalhona, em missões de terreno irregular é a melhor escaladora do esquadrão. Marcia veio do planeta “PURRRRANO” dando então nome a bebida “Moccat da Marcia”. Venha conhece-la pessoalmente!
                    OBS: traga muitos miaubeijos e carinhos.</p>
            </div>
        </div>
        <div class="gato">
            <img src="nora.png" alt="Gato 2">
            <div class="gato-text">
                <h3>NORA</h3>
                <p>Capitã Nora da tripulação Miau CAFÉ 001 veio de um planeta de guerreiras o “CATURNO”, seu nome de guerra era “Madame Nora”. Agora ela voa em sua caixonave juntamente de sua tripulação em busca do “Catuccino” perfeito.
                    Venha conhece-la em nosso espaço CAFÉ. MUITO IMPORTANTE: traga uma caixa, digo, CAIXONAVE para que nossa MADAME sobrevoe os céus e as estrelas mais uma vez. </p>
            </div>
        </div>
        <div class="gato">
            <img src="chico.png" alt="Gato 3">
            <div class="gato-text">
                <h3>FRANCISCO</h3>
                <p>Para os mais intimos “Chico”, um gato muuuuito preguiçoso, dizia que em sua terra natal os gatos trabalhavam tanto que ele tomou suas dores e nasceu preguiçoso. Carinhoso e atencioso, além de amar dormir em qualquer canto, também ama petiscos viu? 
                    Seu planeta natal era o miautcha, dando assim então nome a sua bebida temática “MIAUTCHA”. Venha conhece-lo em nosso espaço e tomar um belo Miautcha.</p>
            </div>
        </div>
        <div class="gato">
            <img src="nestor.png" alt="Gato 4">
            <div class="gato-text">
                <h3>NESTOR</h3>
                <p>Brincalhão e adora carinho, principalmente na barriga. um dos tripulantes da missão Espaço CAFÉ!
                    Um gato preto de muito respeito, venha conhece-lo em nosso espaço. obs: compre petiscos é muito importante para uma relação saudável.
                    Boatos dizem que ele veio do planeta “Miauspresso” se tornando assim a sua bebida temática. Confira o MIAUSPRESSO e muitas outras bebidas em nosso cardápio.</p>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer>
        <img src="GATO.png" alt="Logo do Café dos Gatos">
        <h3>MIAU CAFÉ & ESPAÇO</h3>
        <p>Rua dos Felinos, 123 - Bairro Catlover</p>
        <p>Email: contato@cafedegatos.com | Telefone: (11) 1234-5678</p>
    </footer>
    <button id="scrollTopBtn" onclick="scrollToTop()">
        <img src="paracima.png" alt="Top" />
      </button>

    <!-- JavaScript do Carrossel -->
  <!-- JavaScript do Carrossel e Tema Escuro -->
<!-- JavaScript do Carrossel e Tema Escuro -->
<script>
    // Controle do carrossel
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    document.getElementById('next').addEventListener('click', () => {
        nextSlide();
    });

    document.getElementById('prev').addEventListener('click', () => {
        prevSlide();
    });

    function nextSlide() {
        slides[currentSlide].style.display = 'none';
        currentSlide = (currentSlide + 1) % totalSlides;
        slides[currentSlide].style.display = 'flex';
    }

    function prevSlide() {
        slides[currentSlide].style.display = 'none';
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        slides[currentSlide].style.display = 'flex';
    }

    
    slides.forEach((slide, index) => {
        slide.style.display = index === 0 ? 'flex' : 'none';
    });

    
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;
    const logo = document.getElementById('logo');

    
    function applyTheme(isDarkMode) {
        if (isDarkMode) {
            body.classList.add('dark-mode');
            themeToggle.src = 'gatopreto.png';
            logo.src = 'logogato.png';
        } else {
            body.classList.remove('dark-mode');
            themeToggle.src = 'gatobranco.png';
            logo.src = 'logopreta.png';
        }
    }
    

   
    function saveThemePreference(isDarkMode) {
        localStorage.setItem('dark-mode', isDarkMode ? 'enabled' : 'disabled');
    }

   
    function loadThemePreference() {
        const savedTheme = localStorage.getItem('dark-mode');
        return savedTheme === 'enabled';
    }

    
    themeToggle.addEventListener('click', () => {
        const isDarkMode = !body.classList.contains('dark-mode');
        applyTheme(isDarkMode);
        saveThemePreference(isDarkMode);
    });

    
    const isDarkModeInitial = loadThemePreference();
    applyTheme(isDarkModeInitial);

const scrollTopBtn = document.getElementById("scrollTopBtn");


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollTopBtn.style.display = "block";
  } else {
    scrollTopBtn.style.display = "none";
  }
}


function scrollToTop() {
  document.body.scrollTop = 0; 
  document.documentElement.scrollTop = 0; 
}

</script>


</body>
</html>
