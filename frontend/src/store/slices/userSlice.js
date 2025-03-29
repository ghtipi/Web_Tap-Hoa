import { createSlice } from "@reduxjs/toolkit";

const userSlice = createSlice({
  name: "user",
  initialState: { name: "Guest" },
  reducers: {
    setName: (state, action) => {
      state.name = action.payload;
    },
  },
});

export const { setName } = userSlice.actions;
export default userSlice.reducer;
