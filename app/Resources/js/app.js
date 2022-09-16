import { createApp } from 'vue';

import RapiDocIndex from './components/RapiDocIndex.vue';

const app = createApp();

app.component('RapiDocIndex', RapiDocIndex);

app.mount('#app');
