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
        <h1>Créer un modèle de contrat</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container text-light">
                        <form action="{{ route('contract-models.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom du contrat</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div id="editorjs"></div>
                            <input type="hidden" name="content" id="content">
                            <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
                        </form>
                    </div>
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
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const editor = new EditorJS({
                                holder: 'editorjs',
                                tools: {
                                    header: Header,
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
                                data: {
                                    blocks: [
                                        {
                                            type: "header",
                                            data: {
                                                text: "Titre du contrat",
                                                level: 1
                                            }
                                        }
                                    ]
                                },
                                onReady: () => {
                                    // Sauvegarde initiale dès que l'éditeur est prêt
                                    editor.save().then((outputData) => {
                                        document.getElementById('content').value = JSON.stringify(outputData);
                                    });
                                },
                                onChange: () => {
                                    editor.save().then((outputData) => {
                                        document.getElementById('content').value = JSON.stringify(outputData);
                                    });
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