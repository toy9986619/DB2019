import ExampleComponent from './components/ExampleComponent.vue';
import ErrorComponent from './components/ErrorComponent.vue';

const routes = [
  {
    path: '/',
    component: ExampleComponent
  },
  {
    path: '*',
    component: ErrorComponent
  }
];

export default routes;
