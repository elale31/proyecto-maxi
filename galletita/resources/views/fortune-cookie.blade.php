<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Galleta de la Fortuna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full">
        
        <!-- Título -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-amber-900 mb-2">✨ Galleta de la Fortuna ✨</h1>
            <p class="text-amber-700">Descubre tu mensaje del día</p>
        </div>

        <!-- Contenedor Principal -->
        <div class="bg-white rounded-2xl shadow-2xl p-8 border-4 border-amber-200">
            
            <!-- Galleta Cerrada -->
            <div id="cookie-closed" class="text-center">
                <div class="w-48 h-48 mx-auto mb-6 relative cursor-pointer transform transition-transform hover:scale-105" onclick="openCookie()">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-300 to-amber-500 rounded-full shadow-xl"></div>
                    <div class="absolute inset-2 bg-gradient-to-br from-amber-200 to-amber-400 rounded-full"></div>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-32 h-2 bg-amber-600 rounded-full"></div>
                </div>
                
                <button onclick="openCookie()" class="px-8 py-3 bg-gradient-to-r from-amber-500 to-orange-500 text-white font-semibold rounded-full shadow-lg hover:from-amber-600 hover:to-orange-600 transform transition-all hover:scale-105">
                    Abrir Galleta 🥠
                </button>
            </div>

            <!-- Mensaje de Fortuna -->
            <div id="fortune-display" class="hidden text-center">
                <div class="mb-6">
                    <div class="flex justify-center gap-4 mb-4">
                        <div class="w-24 h-24 bg-gradient-to-br from-amber-300 to-amber-500 rounded-full transform -rotate-12 shadow-lg"></div>
                        <div class="w-24 h-24 bg-gradient-to-br from-amber-300 to-amber-500 rounded-full transform rotate-12 shadow-lg"></div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-amber-100 to-yellow-100 rounded-xl p-6 mb-6 border-2 border-amber-300">
                    <p id="fortune-text" class="text-xl text-amber-900 font-medium leading-relaxed"></p>
                </div>

                <button onclick="resetCookie()" class="px-8 py-3 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-semibold rounded-full shadow-lg hover:from-blue-600 hover:to-indigo-600 transform transition-all hover:scale-105">
                    Otra Galleta ✨
                </button>
            </div>

        </div>
    </div>

    <script>
        async function openCookie() {
            try {
                const response = await fetch('/api/fortuna');
                const data = await response.json();
                
                // Ocultar galleta cerrada
                document.getElementById('cookie-closed').classList.add('hidden');
                
                // Mostrar fortuna
                document.getElementById('fortune-display').classList.remove('hidden');
                document.getElementById('fortune-text').textContent = `"${data.fortune}"`;
                
            } catch (error) {
                console.error('Error al obtener la fortuna:', error);
                alert('Hubo un error al abrir la galleta. Por favor intenta de nuevo.');
            }
        }

        function resetCookie() {
            // Mostrar galleta cerrada
            document.getElementById('cookie-closed').classList.remove('hidden');
            
            // Ocultar fortuna
            document.getElementById('fortune-display').classList.add('hidden');
        }
    </script>
</body>
</html>