import Vue from "vue";
import Vuex from "vuex";

import BlockUIModule from "./modules/assets/BlockUIModule";
import ClienteModule from "./modules/cliente/ClienteModule";

Vue.use(Vuex);

export default new Vuex.Store({
    // state: {},
    // getters: {},
    // mutations: {},
    // actions: {},

    state: {
        overlay: false
    },
    getters: {
        getOverlay(state) {
            return state.overlay;
        }
    },
    mutations: {
        setOverlay(state, value) {
            state.overlay = value;
        }
    },
    actions: {
        setOverlay({commit}, value) {
            commit('setOverlay', value);
        }
    },

    modules: {
        BlockUIModule,
        ClienteModule
    }
})
