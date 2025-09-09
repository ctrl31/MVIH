import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue';


// Importa tu página principal
import Welcome from './Pages/Welcome.vue';


const app = createApp(Welcome); // Monta directamente la página principal

app.mount('#app');