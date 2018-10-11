export const state = () => ({
    allProperties: null,
})

export const mutations = {

    SET_PROPERTY(state, property) {
        state.property = property
    },

}

export const actions = {
    setAllProperties({ commit }, allProperties) {
        commit('SET_ALL_PROPERTIES', allProperties)
    },

}

export const getters = {
    token: state => state.token,
    
}