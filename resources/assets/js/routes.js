import ExampleComponent from './components/ExampleComponent.vue';
import ErrorComponent from './components/ErrorComponent.vue';
import LoginComponent from './components/LoginComponent.vue';

const routes = [
  {
    path: '/',
    component: ExampleComponent
  },
  {
    path: '*',
    component: ErrorComponent
  },
  {
    path: '/login',
    component: LoginComponent
  }
];

export default routes;
