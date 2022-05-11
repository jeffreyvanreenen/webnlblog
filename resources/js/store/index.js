import {createStore} from 'vuex'
import axios from 'axios';
import auth from './modules/auth'
import createPersistedState from 'vuex-persistedstate';


export const store = createStore({
    modules: {
        auth
    },
    plugins: [createPersistedState(
        {
            paths: ['auth.data']
        }
    )],
})
export default store;


