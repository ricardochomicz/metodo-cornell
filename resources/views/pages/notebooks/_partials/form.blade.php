<div class="mb-4">
    <label for="title" class="block text-gray-700 font-semibold mb-2">Título Caderno</label>
    <input type="text" id="title" name="title" value="{{ @$data->title ?? old('title') }}"
        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
        placeholder="Digite o título do caderno">
</div>
<button type="submit" class="bg-blue-600 text-white font-semibold p-3 rounded-lg hover:bg-blue-700 transition">Salvar
</button>
<a href="{{ route('notebooks.index') }}"
    class="bg-gray-300 text-gray-700 font-semibold p-3 rounded-lg hover:bg-gray-400 transition">Voltar</a>
