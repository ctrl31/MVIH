<script setup>
// Importacion archivos
import Header from '../Components/Layouts/Header.vue';
import Footer from '../Components/Layouts/Footer.vue';
//Importacion elementos Vue
import { ref, onMounted, onUnmounted, onBeforeMount } from 'vue';


import cartaBase from '../Assets/Memorama/cartaBase.svg';
import FondoTablero from '../Assets/Memorama/PuroFondo.svg';
import Goti from '../Assets/Memorama/GOTI.svg';
//Imports CARDS
//TOTAL : 
import Agua from '../Assets/Memorama/Cards/agua.svg';
import AguaDef from '../Assets/Memorama/Cards/pistaAgua.svg';
import Acuiferos from '../Assets/Memorama/Cards/acuiferos.svg';
import AcuiferosDef from '../Assets/Memorama/Cards/PistaAcuifero.svg';
import CicloAgua from '../Assets/Memorama/Cards/cicloAgua.svg';
import CicloAguaDef from '../Assets/Memorama/Cards/pistacicloAgua.svg';
import Guardianes from '../Assets/Memorama/Cards/guardianes.svg';
import GuardianesDef from '../Assets/Memorama/Cards/pistaGuardianes.svg';
import Huella from '../Assets/Memorama/Cards/huellaHidrica.svg';
import HuellaDef from '../Assets/Memorama/Cards/pistaHuellaHidrica.svg';
import Lluvia from '../Assets/Memorama/Cards/lluvia.svg';
import LluviaDef from '../Assets/Memorama/Cards/pistaLluvia.svg';
import Medidor from '../Assets/Memorama/Cards/medidor.svg';
import MedidorDef from '../Assets/Memorama/Cards/pistaMedidor.svg';
import Ptar from '../Assets/Memorama/Cards/Ptar.svg';
import PtarDef from '../Assets/Memorama/Cards/pistaPtar.svg';
import Potabilizadora from '../Assets/Memorama/Cards/potabilizadora.svg';
import PotabilizadoraDef from '../Assets/Memorama/Cards/pistaPotabilizadora.svg';
import Pozo from '../Assets/Memorama/Cards/pozoAgua.svg';
import PozoDef from '../Assets/Memorama/Cards/pistaPozoAgua.svg';
import Estados from '../Assets/Memorama/Cards/estadosAgua.svg';
import EstadosDef from '../Assets/Memorama/Cards/pistaEstadosAgua.svg';

// Cartas base: cada par comparte el mismo "value" (clave),
// pero pueden tener imágenes diferentes.
const cards = ref([
    { id: 1, value: 'agua', image: Agua, flipped: false, matched: false },
    { id: 2, value: 'agua', image: AguaDef, flipped: false, matched: false },
    { id: 3, value: 'acuiferos', image: Acuiferos, flipped: false, matched: false },
    { id: 4, value: 'acuiferos', image: AcuiferosDef, flipped: false, matched: false },
    { id: 5, value: 'ciclo', image: CicloAgua, flipped: false, matched: false },
    { id: 6, value: 'ciclo', image: CicloAguaDef, flipped: false, matched: false },
    { id: 7, value: 'guardianes', image: Guardianes, flipped: false, matched: false },
    { id: 8, value: 'guardianes', image: GuardianesDef, flipped: false, matched: false },
    { id: 9, value: 'huella', image: Huella, flipped: false, matched: false },
    { id: 10, value: 'huella', image: HuellaDef, flipped: false, matched: false },
    { id: 11, value: 'lluvia', image: Lluvia, flipped: false, matched: false },
    { id: 12, value: 'lluvia', image: LluviaDef, flipped: false, matched: false },
    { id: 13, value: 'medidor', image: Medidor, flipped: false, matched: false },
    { id: 14, value: 'medidor', image: MedidorDef, flipped: false, matched: false },
    { id: 15, value: 'ptar', image: Ptar, flipped: false, matched: false },
    { id: 16, value: 'ptar', image: PtarDef, flipped: false, matched: false },
    { id: 17, value: 'potabilizadora', image: Potabilizadora, flipped: false, matched: false },
    { id: 18, value: 'potabilizadora', image: PotabilizadoraDef, flipped: false, matched: false },
    { id: 19, value: 'pozo', image: Pozo, flipped: false, matched: false },
    { id: 20, value: 'pozo', image: PozoDef, flipped: false, matched: false },
    { id: 21, value: 'estados', image: Estados, flipped: false, matched: false },
    { id: 22, value: 'estados', image: EstadosDef, flipped: false, matched: false },

])

// Mezclar cartas al inicio
cards.value = cards.value.sort(() => Math.random() - 0.5)

const flippedCards = ref([])
const attempts = ref(0)
const pairCards = ref(0)

const flipCard = (card) => {
    if (card.flipped || card.matched || flippedCards.value.length === 2) return

    card.flipped = true
    flippedCards.value.push(card)

    if (flippedCards.value.length === 2) {
        attempts.value++
        checkMatch()
    }
}

const checkMatch = () => {
    const [c1, c2] = flippedCards.value
    if (c1.value === c2.value) {
        c1.matched = true
        c2.matched = true
        pairCards.value++
    } else {
        setTimeout(() => {
            c1.flipped = false
            c2.flipped = false
        }, 1000)
    }
    flippedCards.value = []
}
</script>

<template>

    <div class="bg-gray-50 text-black/50 dark:bg-[#282878] dark:text-white/50">
        <div class="relative min-h-screen flex flex-col selection:bg-[#ffffff] selection:text-white ">
            <Header />
            <!--Componente Memorama-->
            <div class="items-center justify-center">
                <div class="min-h-screen relative flex flex-col items-center justify-center p-6 bg-[#272778]">
                    <!-- Fondo -->
                    <img id="background" class="absolute inset-0 w-full h-full object-cover opacity-30 -z-5"
                        :src="FondoTablero" />

                    <!-- Contenido principal -->
                    <div class="relative z-10 w-full max-w-6xl px-4">
                        <h1 class="text-3xl md:text-5xl font-bold mb-6 text-center">💧 Memorama Hídrico</h1>

                        <!-- indicadores -->
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-6">
                            <h2 class="text-lg">Intentos: <span class="font-semibold">{{ attempts }}</span></h2>
                            <p class="text-lg">Pares Encontrados: <span class="font-semibold">{{ pairCards }}</span></p>
                        </div>

                        <!-- tablero: grid responsivo -->
                        <div class="w-full h-full justify-center">
                            <div class="grid gap-4 w-full h-auto" :class="{
                                'grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7': true
                            }">
                                <div v-for="card in cards" :key="card.id"
                                    class="card bg-white rounded-xl shadow-md flex items-center justify-center cursor-pointer text-3xl transition-all duration-300"
                                    :class="{ 'bg-[#C09B57]': card.matched }" @click="flipCard(card)">

                                    <!-- Cara frente (boca abajo) -->
                                    <div v-if="!card.flipped && !card.matched"
                                        class="flex items-center justify-center w-full h-full bg-white">
                                        <img :src="cartaBase" alt="Carta base"
                                            class="max-w-[90%] max-h-[90%] object-contain" />
                                    </div>

                                    <!-- Cara trasera (boca arriba / matched) -->
                                    <div v-else class="flex items-center justify-center w-full h-full bg-white">
                                        <img :src="card.image" :alt="card.value"
                                            class="max-w-[90%] max-h-[90%] object-contain" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Imagen pequeña en la esquina inferior derecha -->
                    <img :src=Goti alt="Badge"
                        class="pointer-events-none fixed bottom-4 right-4 w-24 h-24 md:w-55 md:h-55 opacity-75 drop-shadow-lg z-50" />
                </div>
            </div>
            <Footer />

        </div>
    </div>
</template>