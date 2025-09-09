<script setup>

import Header from '../Components/Header.vue';
import Mascota from '../Assets/mascotaBoton.png';
import Fondo from '../Assets/tomaAerea.jpeg';

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



        </div>

    </div>


</template>