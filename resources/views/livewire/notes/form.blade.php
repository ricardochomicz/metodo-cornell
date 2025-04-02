<form action="{{ route('notes.store') }}" method="POST">
    @csrf
    <div class="p-6 bg-white shadow-lg rounded-lg mt-5">
        <!-- Cabeçalho -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold text-gray-800">Nova Anotação</h1>
            <div class="flex space-x-3">
                <button type="submit" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-save"></i>
                </button>
                <button class="text-gray-600 hover:text-gray-900"><i class="fas fa-print"></i></button>
                <button class="text-gray-600 hover:text-gray-900"><i class="fas fa-download"></i></button>
                <button class="text-gray-600 hover:text-gray-900"><i class="fas fa-image"></i></button>
                <button class="text-gray-600 hover:text-gray-900"><i class="fas fa-trash"></i></button>
            </div>
        </div>

        <!-- Input para o Título -->
        <div class="mb-4">
            <input type="text" id="title" name="title"
                class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Digite o título da anotação...">
        </div>

        <!-- Corpo da Página -->
        <div class="grid grid-cols-3 gap-4">
            <!-- Perguntas / Palavras-chave -->
            <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                <h2 class="text-blue-500 font-semibold">Tópicos</h2>
                <div class="  p-2 rounded-lg mt-2">
                    <textarea id="topics" name="keywords"
                        class="w-full bg-white p-2 rounded-lg resize-none focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Adicione seus tópicos..."></textarea>
                </div>
            </div>

            <!-- Anotações -->
            <div class="col-span-2 bg-gray-100 p-4 rounded-lg shadow-sm">
                <h2 class="text-blue-500 font-semibold">Anotações</h2>
                <div class=" p-2 rounded-lg mt-2">
                    <textarea id="editor" name="content"
                        class="w-full bg-white p-2 rounded-lg resize-none focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Adicione suas anotações..."></textarea>
                </div>
            </div>
        </div>

        <!-- Resumo -->
        <div class="bg-gray-100 p-4 rounded-lg shadow-sm mt-4">
            <h2 class="text-blue-500 font-semibold">Resumo</h2>
            <textarea name="summary"
                class="w-full bg-white border border-gray-300 p-2 mt-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Sintetize as principais ideias..."></textarea>
        </div>

    </div>
</form>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new EasyMDE({
                element: document.getElementById("editor"),
                spellChecker: false,
                forceSync: true,
                autosave: {
                    enabled: true,
                    uniqueId: "myNotes",
                    delay: 1000,
                },
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            new EasyMDE({
                element: document.getElementById("topics"),
                spellChecker: false,
                forceSync: true,
                toolbar: ["bold", "unordered-list", "ordered-list"],

            });
        });
    </script>
@endpush
