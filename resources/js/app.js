import './bootstrap';
import { createApp } from 'vue';
import PostComponent from './components/post/PostComponent.vue';

createApp({})
    .component('PostComponent', PostComponent)
    .mount('#app')
