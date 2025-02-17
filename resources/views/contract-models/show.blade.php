<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrats</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h1>Visualisation du modèle de contrat</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container text-light">
                        <h1>{{ $contractModels->name }}</h1>
                        <div id="editorjs" style="min-height:300px; border:1px solid #ccc;"></div>
                    </div>

                    <!-- Inclusion des scripts Editor.js -->
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>
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
                            console.log("DOM fully loaded and parsed");

                            // Récupération de la chaîne JSON via Blade
                            const contentString = @json($contractModels->content);
                            console.log("Content string from DB:", contentString);

                            let parsedData = {};
                            try {
                                // Premier parsing
                                const intermediate = JSON.parse(contentString);
                                console.log("Intermediate result after first JSON.parse:", intermediate);

                                // Si le résultat est encore une chaîne, on parse à nouveau
                                if (typeof intermediate === 'string') {
                                    parsedData = JSON.parse(intermediate);
                                    console.log("Final parsed data after second JSON.parse:", parsedData);
                                } else {
                                    parsedData = intermediate;
                                    console.log("Final parsed data (only one parse needed):", parsedData);
                                }
                            } catch (e) {
                                console.error("Error parsing contentString:", e);
                            }

                            console.log("Type of parsedData:", typeof parsedData);
                            if (parsedData && parsedData.blocks) {
                                console.log("Parsed data contains blocks:", parsedData.blocks);
                            } else {
                                console.warn("Parsed data does not contain blocks property");
                            }

                            // Initialisation de Editor.js en mode lecture seule
                            const editor = new EditorJS({
                                holder: 'editorjs',
                                readOnly: true,
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
                                onReady: () => {
                                    console.log("Editor.js is ready");
                                },
                                onChange: () => {
                                    console.log("Editor.js content changed");
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