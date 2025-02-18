<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modèle de Contrats</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h1>Modifier le modèle de contrat</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container text-light">
                        <form action="{{ route('contract-models.update', $contractModels->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom du contrat</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $contractModels->name }}" required>
                            </div>
                            <div id="editor"></div>
                            <input type="hidden" name="content" id="content" value="{{ $contractModels->content }}">
                            <button type="submit" class="btn btn-blue">Mettre à jour</button>
                        </form>
                    </div>

                    <!-- Inclusion des scripts Editor.js -->
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@2"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/editorjs-button@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const contentString = @json($contractModels->content);
                            const parsedData = JSON.parse(contentString);

                            const editor = new EditorJS({
                                holder: 'editor',
                                tools: {
                                    header: Header,
                                    paragraph: {
                                        class: Paragraph,
                                        inlineToolbar: true,
                                    },
                                    image: SimpleImage,
                                    checklist: Checklist,
                                    code: CodeTool,
                                    embed: Embed,
                                    table: Table,
                                    link: LinkTool,
                                    marker: Marker,
                                    inlineCode: InlineCode,
                                    list: {
                                        class: EditorjsList,
                                        inlineToolbar: true,
                                        config: {
                                            defaultStyle: 'unordered'
                                        },
                                    },
                                },
                                data: parsedData,
                                onChange: async () => {
                                    const outputData = await editor.save();
                                    document.getElementById('content').value = JSON.stringify(outputData);
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</html>