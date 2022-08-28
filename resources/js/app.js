import './bootstrap';
import '../css/app.css';

import {createApp , h} from 'vue';
import App from './src/App.vue';
import Route from './src/route/index';
import components from './src/components'
import {createPinia} from 'pinia'
const app = createApp({
    render: () => h(App),
});
app.use(Route);

for(var i=0; i < components.length ; i++){
    app.component(components[i]['name'],components[i]['component']);
}
app.use(createPinia())

app.mount("#app");

