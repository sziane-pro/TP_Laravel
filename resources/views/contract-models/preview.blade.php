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
        <h1>Prévisualisation du contrat</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container text-light">
                        <div id="editorjs" style="min-height:300px; border:1px solid #ccc;"></div>
                    </div>


                    
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>
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
                            console.log("Chargement de la prévisualisation...");

                            try {
                                const finalContractString = @json($finalContract);
                                const contractData = JSON.parse(finalContractString);

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
                                    data: contractData,
                                    onReady: () => {
                                        console.log("Editor.js is ready in preview mode");
                                    }
                                });
                            } catch (error) {
                                console.error("Erreur lors du parsing du contrat:", error);
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</html>