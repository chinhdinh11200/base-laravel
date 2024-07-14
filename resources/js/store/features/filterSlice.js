import { createSlice } from "@reduxjs/toolkit"

const initialState = {
  keyword: '',
}

const filterSlice = createSlice({
  name: 'filter',
  initialState,
  reducers: {
    setKey: (state, action) => ({
      ...state,
      keyword: action.payload,
    }),
    getKey: (state, action) => ({
      ...state,
    })
  }
})

export const {getKey, setKey} = filterSlice.actions;
export default filterSlice.reducer;
