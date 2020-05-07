import AllBills from './components/AllBills.vue';
import Create from './components/Create.vue';
import Edit from './components/Edit.vue';
import Delete from './components/Delete.vue';
import MonthlyIncome from './components/MonthlyIncome.vue';

export const routes = [
    {
        name: 'home',
        path: '/all/',
        component: AllBills
    },
    {
        name: 'add',
        path: '/add/',
        component: Create
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: Edit
    },
    {
        name: 'delete',
        path: '/delete/:id',
        component: Delete
    },
    {
        name: 'monthly-income',
        path: '/monthly-income/',
        component: MonthlyIncome
    }
];