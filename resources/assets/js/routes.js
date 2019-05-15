import IndexComponent from './components/IndexComponent.vue';
import ErrorComponent from './components/ErrorComponent.vue';
import LoginComponent from './components/LoginComponent.vue';
import TeamComponent from './components/TeamComponent.vue';
import QuestComponent from './components/QuestComponent.vue';
import ItemComponent from './components/ItemComponent.vue';
import QuestReviewComponent from './components/QuestReviewComponent.vue';

const routes = [
  {
    path: '/',
    component: IndexComponent
  },
  {
    path: '/login',
    component: LoginComponent
  },
  {
    path: '/team',
    component: TeamComponent
  },
  {
    path: '/quest',
    component: QuestComponent
  },
  {
    path: '/item',
    component: ItemComponent
  },
  {
    path: '/questReview',
    component: QuestReviewComponent
  },
  {
    path: '*',
    component: ErrorComponent
  },
];

export default routes;
