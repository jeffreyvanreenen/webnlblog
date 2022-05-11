import axios from 'axios'
import router from '../../router'



const state = {
    data: {
        user: {},
        isAuthenticated: false
    }
}

const getters = {
    isAuthenticated(state) {
        return state.data.isAuthenticated;
    },
    currentUser(state) {
        return state.data.user;
    }
}

const actions = {

    async login({commit}, credentials) {
        console.log(credentials)
        await axios.get('http://webnlblog.digicate.nl/sanctum/csrf-cookie');
        await axios.post('http://webnlblog.digicate.nl/login', credentials)
            .then((response) => {
                console.log(response.data);
                commit('setAuthenticated');
                commit('setUser', response.data.user);
                router.push({ name: 'home'})
            })
            .catch((error) => {
                console.log(error);
            });
    },


    async register({commit}, credentials) {
        console.log(credentials)

        await axios.get('http://webnlblog.digicate.nl/sanctum/csrf-cookie');
        await axios.post('http://webnlblog.digicate.nl/register', credentials)
            .then((response) => {
                console.log(response.data);
                commit('setAuthenticated');
                commit('setUser', response.data.user);
                router.push({ name: 'home'})
            })
            .catch((error) => {
                console.log(error);
            });
    },

    async logout({commit}) {
        console.log('hi!')
        await axios.get('http://webnlblog.digicate.nl/sanctum/csrf-cookie');
        await axios.post('http://webnlblog.digicate.nl/logout')
            .then((response) => {
                console.log(response.data);
                commit('unsetAuthenticated');
                commit('unsetUser', response.data.user);
            })
            .catch((error) => {
                console.log(error);
            });
    }

}

const mutations = {
    setAuthenticated: (state) => (state.data.isAuthenticated = true),
    setUser: (state, user) => (state.data.user = user),
    unsetAuthenticated: (state) => (state.data.isAuthenticated = false),
    unsetUser: (state, user) => (state.data.user = {}),
}

export default {
    state,
    getters,
    actions,
    mutations
}
// plugins: [createPersistedState()],


//
// export const store = createStore({
//     state: {
//         authenticated: false,
//         user: {},
//     },
//     // plugins: [createPersistedState()],
//     mutations: {
//         authenticateUser(state, value) {
//             state.authenticated = value;
//         },
//         setUser(state, value) {
//             state.user = value
//         }
//     },
//     actions: {
//         async login({commit}, credentials) {
//             console.log(credentials)
//             await axios.get('http://webnlblog.digicate.nl/sanctum/csrf-cookie');
//             const res = await axios.post('http://webnlblog.digicate.nl/login', credentials);
//             commit('authenticateUser', res.data)
//             console.log(res.data)
//             router.push('/');
//         },
//
//         async register({commit}, credentials) {
//             await axios.get('http://webnlblog.digicate.nl/sanctum/csrf-cookie');
//             const res = await axios.post('http://webnlblog.digicate.nl/register', credentials);
//             // commit('authenticateUser', res.data)
//             // commit('setUser', res.data)
//             // router.push('/l');
//             // https://techvblogs.com/blog/spa-authentication-laravel-sanctum-vuejs
//         },
//
//
//     },
//     getters: {
//         isAuthenticated(state) {
//             return state.authenticated;
//         },
//         currentUser(state) {
//             return state.user;
//         }
//     },
//     modules: {}
// })
// export default store;
