<script setup>
// Importacion archivos
import Header from '../Components/Layouts/Header.vue';
import Footer from '../Components/Layouts/Footer.vue';
import Mascota from '../Assets/mascotaBoton.png';
import Fondo from '../Assets/tomaAerea.jpeg';
import MemoFondo from '../Assets/Memorama/MemoramaBoton.svg';

//Importacion elementos Vue
import { ref, onMounted, onUnmounted, onBeforeMount } from 'vue';

//Importacion librerias extras
import LiteYouTubeEmbed from 'vue-lite-youtube-embed';
import 'vue-lite-youtube-embed/style.css';
import 'animate.css';

// Variables reactivas para las animaciones
const shouldAnimate = ref(false);
const parallaxOffset = ref(0);
const heroSection = ref(null);
const animatedSection = ref(null);
const animatedSubSection = ref(null);

// Controlar la animación al hacer scroll
const handleScroll = () => {
    if (!animatedSection.value) return;


    // Obtener la posición de la sección animada
    const sectionPosition = animatedSection.value.getBoundingClientRect();

    // Activar animación cuando la sección es visible
    if (sectionPosition.top < window.innerHeight * 0.75 && !shouldAnimate.value) {
        shouldAnimate.value = true;

        // Remover la clase después de la animación para poder reactivarla
        setTimeout(() => {
            shouldAnimate.value = false;
        }, 1000);
    }

    // Efecto parallax para la imagen de fondo
    if (heroSection.value) {
        const heroPosition = heroSection.value.getBoundingClientRect();
        if (heroPosition.top <= 0 && heroPosition.bottom >= 0) {
            // Calcular el desplazamiento basado en la posición de scroll
            parallaxOffset.value = heroPosition.top * 0.5;
        }
    }
};

// Añadir event listener cuando el componente se monta
onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    // Disparar una vez al cargar para verificar la posición inicial
    handleScroll();
});

// Remover event listener cuando el componente se desmonta
onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}


</script>

<template>
    <div class="bg-gray-50 text-black/50 dark:bg-[#282878] dark:text-white/50">
        <div class="relative min-h-screen flex flex-col selection:bg-[#ffffff] selection:text-white">
            <Header />


            <!--- Seccion GOTY saludando --->
            <section ref="heroSection"
                class="relative min-h-screen flex items-center justify-center bg-[#313131] overflow-hidden">
                <!-- Imagen de fondo con efecto parallax -->
                <div class="parallax-container absolute inset-0 w-full h-full overflow-hidden">
                    <img id="background" class="parallax-image absolute inset-0 w-full h-full object-cover opacity-25"
                        :src="Fondo" :style="{ transform: `translateY(${parallaxOffset}px)` }" />
                </div>

                <!-- Card principal -->
                <div class="relative z-10 flex flex-col items-center justify-center text-center rounded-full
                          backdrop-blur-0 p-10 max-w-2xl w-full">
                    <img :src="Mascota" alt="Mascota" class="w-3/4 h-50 object-contain" />
                </div>
            </section>

            <!--- Seccion Subtitulo animado--->
            <section ref="animatedSection"
                class="flex bg-[#c09b57] relative p-14 items-center justify-center text-center">
                <div class="text-white text-center">
                    <p :class="{ 'animate__animated animate__tada': shouldAnimate }" class="text-6xl">Descubrir mas</p>
                </div>
            </section>
            <!--- Seccion Minijuegos Proximos--->

            <div class="w-full h-full">
                <div class="grid grid-cols-1 md:grid-cols-6 gap-0 w-full h-full">
                    <!-- Contenedor 1 -->
                    <div
                        class="game-card md:col-span-4 md:col-start-1 bg-gradient-to-br from-[#0831e9e3] to-[#ffff] rounded-s-none p-6 flex flex-col items-center justify-center h-64 md:h-80">
                        <span class="text-4xl md:text-5xl font-bold text-white mb-2">MAPA </span>
                        <span class="text-3xl md:text-4xl font-bold text-yellow-300 mb-4">INTERACTIVO</span>
                        <button
                            class="px-6 py-3 bg-yellow-500 text-black font-bold rounded-lg hover:bg-yellow-400 transition-colors">
                            Conocelo
                        </button>
                    </div>

                    <!-- Contenedor 2  -->
                    <div
                        class="game-card md:col-start-5 md:col-end-7  bg-gradient-to-br from-blue-500 to-purple-600 rounded-s-none p-4 flex flex-col items-center justify-center h-64 md:h-80">
                        <div class="mb-4 flex space-x-2">
                            <span class="w-6 h-6 bg-red-500 rounded-full"></span>
                            <span class="w-6 h-6 bg-yellow-500 rounded-full"></span>
                            <span class="w-6 h-6 bg-green-500 rounded-full"></span>
                            <span class="w-6 h-6 bg-blue-500 rounded-full"></span>
                        </div>
                        <span class="text-2xl md:text-3xl font-bold mb-2"></span>
                        <span class="text-3xl md:text-4xl font-bold">colores</span>
                    </div>

                    <!-- Contenedor 3 -  -->
                    <div
                        class="game-card md:col-span-4 md:col-end-5 bg-gradient-to-br from-[#0b5039] to-[#1f1f1f] rounded-b-none p-4 flex flex-col items-center justify-center h-64 md:h-80">
                        <div class="mb-4 flex items-center justify-center">

                            <span class="text-4xl md:text-5xl font-bold">🥽🥼</span>
                        </div>
                        <span class="text-3xl md:text-4xl font-bold">Guardianes del agua</span>
                    </div>


                    <!-- Contenedor 5 -  -->
                    <a href="/juegos/memorama" class="relative cursor-pointer game-card md:col-span-2 md:col-end-7 
                        rounded-s-none p-4 flex items-center justify-center h-60 md:h-80 overflow-auto bg-[#020224] ">
                        <!-- Imagen de fondo -->
                        <img :src="MemoFondo" alt="Memorama"
                            class="absolute inset-0 w-full h-full object-fit-contain position-fixed" />

                    </a>


                    <!-- Contenedor 6 -   -->
                    <div
                        class="game-card md:col-start-1 md:col-end-7 bg-gradient-to-br from-[#0b5c8b] to-[#58bbf5] rounded-s-none p-6 flex flex-col md:flex-row items-center justify-between h-auto md:h-64">
                        <div class="text-center md:text-left mb-4 md:mb-0">
                            <span class="text-2xl md:text-3xl font-bold block">Contenido</span>
                            <span class="text-3xl md:text-4xl font-bold text-white">Audiovisual</span>
                        </div>

                        <div class="text-center md:text-right">
                            <span class="text-2xl md:text-3xl font-bold block">Destreza</span>
                            <span class="text-3xl md:text-4xl font-bold text-white">Mental</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--- Seccion Subtitulo animado animatedSubSection--->
            <section ref="animatedSubSection"
                class="flex bg-[#1e1248] relative p-9 items-center justify-center text-center">
                <div class="text-white text-center">
                    <p :class="{ 'animate__animated animate__jello': shouldAnimate }" class="text-4xl p-6">Cultura del
                        Agua</p>
                    <p>Conoce algunos videos informativos sobre el ciclo del agua</p>
                </div>
            </section>
            <!--- Seccion Videos --->
            <section class="flex bg-[#1e1248] relative p-4 md:p-14 text-center w-full ">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full h-full">
                    <div>
                        <p class="p-4 text-2xl">¿Que es un PTAR? ❔</p>
                        <LiteYouTubeEmbed id="6XwdBBaBLko" title="PTAR - Que significa PTAR" />
                    </div>
                    <div>
                        <p class="p-4 text-2xl">La labor en campo 👷‍♀️👷‍♂️</p>
                        <LiteYouTubeEmbed id="lF2F3H7KaUo" title="Trabajadores - La importancia de la labor en campo" />
                    </div>
                    <div>
                        <p class="p-4 text-2xl">Conoce las acciones preventivas 📝</p>
                        <LiteYouTubeEmbed id="K4He8rxd2x0"
                            title="Trabajos realizados - Conoce las acciones preventivas" />
                    </div>
                </div>
            </section>


            <Footer/>

        </div>

    </div>


</template>