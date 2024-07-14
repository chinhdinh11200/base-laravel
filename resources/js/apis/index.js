import axios from "axios";
console.log(process.env, import.meta.env);
export const AXIOS_INSTANCE = axios.create({
  baseURL: "",
});
