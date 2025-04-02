<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Bem-vindo de volta</h2>

        <form class="space-y-4" action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" name="email"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
                    placeholder="Digite seu e-mail">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Senha</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
                    placeholder="Digite sua senha">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Entrar</button>
        </form>

        <p class="text-sm text-center text-gray-600 mt-4">Não tem uma conta? <a href="{{ route('register') }}"
                class="text-blue-500 hover:underline">Cadastre-se</a></p>
    </div>
</body>

</html>
