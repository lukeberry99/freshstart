import localforage from 'localforage'
import { isEmpty } from 'lodash'

export const setToken = (state, token) => {
    if (isEmpty(token)) {
        localforage.removeItem('authtoken', token)
        return;
    }

    localforage.setItem('authtoken', token)
}

export const setAuthenticated = (state, value) => {
    state.user.authenticated = value
}

export const setUserData = (state, data) => {
    state.user.data = data
}
