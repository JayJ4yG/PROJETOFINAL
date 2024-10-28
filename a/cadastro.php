<?php
// Definindo as credenciais do banco de dados
$host = "localhost"; // ou o endereço do seu servidor
$dbname = "login_db";
$username = "root"; // substitua pelo seu usuário do banco de dados
$password = ""; // substitua pela sua senha do banco de dados

// Estabelecendo a conexão com o banco de dados
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurando o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}

// Verificando se o formulário de cadastro foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    // Capturando os dados do formulário de cadastro
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha

    // Preparando e executando a consulta de inserção
    try {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        echo "<div id='msgSuccessCadastro'>Cadastro realizado com sucesso!</div>";
    } catch (PDOException $e) {
        echo "<div id='msgErrorCadastro'>Erro ao cadastrar: " . $e->getMessage() . "</div>";
    }
}

// Verificando se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['name'])) {
    // Capturando os dados do formulário de login
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparando e executando a consulta de seleção
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Verificando se o usuário existe
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // Verificando a senha
            if (password_verify($password, $user['password'])) {
                // Iniciando a sessão para o usuário
                session_start();
                $_SESSION['user_id'] = $user['id']; // Armazenando o ID do usuário na sessão
                $_SESSION['role'] = $user['role']; // Armazenando o papel do usuário na sessão

                // Redirecionando para index.php
                header("Location: index.php");
                exit(); // Certificando-se de que o script termina após o redirecionamento
            } else {
                echo "<div id='msgErrorLogin'>Senha incorreta!</div>";
            }
        } else {
            echo "<div id='msgErrorLogin'>Usuário não encontrado!</div>";
        }
    } catch (PDOException $e) {
        echo "<div id='msgErrorLogin'>Erro ao realizar o login: " . $e->getMessage() . "</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="cadastro.css">
    <title>Miau Café & Espaço</title>
</head>

<body>

    <div class="container" id="container">
        <!-- Container principal que envolve toda a estrutura da página, usado para a estilização e controle de layout -->
    
        <div class="form-container sign-up">
            <!-- Container para o formulário de registro de usuário -->
    
            <form method="post" action="cadastro.php">
                <!-- Formulário para cadastro. A função 'cadastrar' é chamada quando o formulário é enviado -->
                <h1>Crie uma conta</h1>
                <!-- Título da seção de cadastro -->
    
                <div class="social-icons">
                    <!-- Ícones para redes sociais, que são links fictícios neste exemplo -->
    
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <!-- Ícone do Google+ (depreciado, mas incluído como exemplo) -->
    
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <!-- Ícone do Facebook -->
    
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <!-- Ícone do GitHub -->
    
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    <!-- Ícone do LinkedIn -->
                </div>
    
                <span>ou use seu E-mail para o registro</span>
                <!-- Texto explicativo sobre como o usuário pode se registrar com um e-mail -->
    
                <input type="text" name="name" placeholder="Nome" id="name">
                <!-- Campo de entrada para o nome do usuário, com o id 'nome' para seleção no JavaScript -->
    
                <input type="email" name="email" placeholder="Email" id="email">
                <!-- Campo de entrada para o e-mail do usuário, com o id 'emailRegistro' para seleção no JavaScript -->
    
                <input type="password" name="password" placeholder="Senha" id="password">
                <!-- Campo de entrada para a senha do usuário, com o id 'senhaRegistro' para seleção no JavaScript -->
    
                <div id="msgErrorCadastro" style="display:none; color:red;"></div>
                <!-- Div para mensagens de erro no cadastro, inicialmente oculta -->
    
                <div id="msgSuccessCadastro" style="display:none; color:green;"></div>
                <!-- Div para mensagens de sucesso no cadastro, inicialmente oculta -->
    
                <button type="submit">Cadastrar</button>
                <!-- Botão para enviar o formulário de cadastro -->
            </form>
        </div>
<!--






















-->
        <div class="form-container sign-in">
            <!-- Container para o formulário de login -->
    
            <form form method="post" action="cadastro.php">
                <!-- Formulário para login. A função 'logar' é chamada quando o formulário é enviado -->
                <h1>Entrar</h1>
                <!-- Título da seção de login -->
    
                <div class="social-icons">
                    <!-- Ícones para redes sociais, semelhantes aos ícones no formulário de registro -->
    
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <!-- Ícone do Google+ -->
    
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <!-- Ícone do Facebook -->
    
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <!-- Ícone do GitHub -->
    
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    <!-- Ícone do LinkedIn -->
                </div>
    
                <span>ou use seu E-mail e sua Senha</span>
                <!-- Texto explicativo sobre como o usuário pode fazer login com e-mail e senha -->
    
                <input type="email" name="email" placeholder="Email" id="email">
                <!-- Campo de entrada para o e-mail do usuário, com o id 'emailLogin' para seleção no JavaScript -->
    
                <input type="password" name="password" placeholder="Senha" id="password">
                <!-- Campo de entrada para a senha do usuário, com o id 'senhaLogin' para seleção no JavaScript -->
    
                <div id="msgErrorLogin" style="display:none; color:red;"></div>
                <!-- Div para mensagens de erro no login, inicialmente oculta -->
    
                <button type="submit" href="pagina2.php">Entrar</button>
                <!-- Botão para enviar o formulário de login -->
            </form>
        </div>
    
        <div class="toggle-container">
            <!-- Container para os botões de alternância entre login e cadastro -->
    
            <div class="toggle">
                <!-- Container para o painel de alternância -->
    
                <div class="toggle-panel toggle-left">
                    <!-- Painel de alternância para login -->
    
                    <h1>Olá de Volta</h1>
                    <!-- Título do painel de login -->
    
                    <p>Caso já possua uma conta clique no botão abaixo para efetuar o Login</p>
                    <!-- Texto explicativo sobre o login -->
    
                    <button class="hidden" id="login">Login</button>
                    <!-- Botão para alternar para o painel de login, inicialmente oculto -->
                </div>
    
                <div class="toggle-panel toggle-right">
                    <!-- Painel de alternância para cadastro -->
    
                    <h1>Olá, MiauMigo!</h1>
                    <!-- Título do painel de cadastro -->
    
                    <p>Caso não possua uma conta clique no botão abaixo para efetuar o cadastro</p>
                    <!-- Texto explicativo sobre o cadastro -->
    
                    <button class="hidden" id="register">Cadastro</button>
                    <!-- Botão para alternar para o painel de cadastro, inicialmente oculto -->
                </div>
            </div>
        </div>
    </div>
    
    <script src="script.js"></script>
    <!-- Inclusão do arquivo JavaScript externo que contém a lógica para alternar entre login e cadastro, e manipular o formulário -->
</body>

</html>
