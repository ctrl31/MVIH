import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue';


// Importa MEMORAMA GAME
import MemoramaGame from './Pages/MemoramaGame.vue';

const app = createApp(MemoramaGame); // Monta en blade dedicado a elemento memorama

app.mount('#memorama');