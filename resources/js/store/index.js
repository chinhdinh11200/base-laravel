import {configureStore} from '@reduxjs/toolkit'
import reducer from './reducer'

export const makeStore = () => {
  return configureStore({
    reducer: reducer,
  })
}
