<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cornell Notes - Página de Início</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-lg">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">Cornell Notes</h1>
            <a href="/login"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-all duration-300 shadow-md hover:shadow-xl">
                Login
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section
        class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight animate-fade-in">
                Organize Suas Anotações com o Método Cornell
            </h2>
            <p class="text-lg md:text-xl text-gray-100 mb-8 max-w-2xl mx-auto">
                Aumente sua produtividade e retenha mais informações com um sistema de anotações comprovado, projetado
                para estudantes e profissionais.
            </p>
            <a href="/login"
                class="inline-block bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold text-lg hover:bg-indigo-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                Comece Agora
            </a>
        </div>
    </section>

    <!-- Método Cornell Explicação -->
    <section class="py-20 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <h3 class="text-4xl font-bold text-center text-gray-900 dark:text-gray-100 mb-12">
                Como Funciona o Método Cornell
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Seção de Anotações -->
                <div
                    class="bg-indigo-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h4 class="text-2xl font-semibold text-indigo-600 dark:text-indigo-400 mb-4">Anotações</h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Registre suas ideias principais e detalhes importantes nesta seção. Use bullet points ou
                        parágrafos para capturar o conteúdo da aula ou reunião.
                    </p>
                </div>
                <!-- Seção de Palavras-chave -->
                <div
                    class="bg-purple-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h4 class="text-2xl font-semibold text-purple-600 dark:text-purple-400 mb-4">Palavras-chave</h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Identifique conceitos-chave, termos ou perguntas que resumem o conteúdo. Esta seção ajuda na
                        revisão rápida e memorização.
                    </p>
                </div>
                <!-- Seção de Resumo -->
                <div
                    class="bg-pink-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h4 class="text-2xl font-semibold text-pink-600 dark:text-pink-400 mb-4">Resumo</h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Ao final, resuma as ideias principais em poucas frases. Isso reforça o aprendizado e facilita a
                        revisão para provas ou apresentações.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-4xl font-bold mb-6">Pronto para Transformar Suas Anotações?</h3>
            <p class="text-lg mb-8 max-w-xl mx-auto">
                Junte-se a milhares de usuários que já utilizam o Método Cornell para estudar e trabalhar de forma mais
                eficiente.
            </p>
            <a href="/login"
                class="inline-block bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold text-lg hover:bg-indigo-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                Faça Login e Comece
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-100 py-6">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 Cornell Notes. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Estilo para Animação -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }
    </style>
</body>

</html>
