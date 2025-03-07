import './bootstrap';
import '../css/app.css';

import { createApp } from 'vue'; // Import Vue 3's createApp function
import PdfToTextComponent from './Components/PdfToTextComponent.vue';
import PdfToWordComponent from './Components/PdfToWordComponent.vue';
import JpgToWordComponent from './Components/JpgToWordComponent.vue';
import ImgtotxtComponent from './Components/imgtotxtComponent.vue';
import ImgtrComponent from './Components/imgtrComponent.vue';


const app = createApp({
    components: {
        PdfToTextComponent,
        PdfToWordComponent,
        JpgToWordComponent,
        ImgtotxtComponent,
        ImgtrComponent,

    },
});

app.mount('#app');
