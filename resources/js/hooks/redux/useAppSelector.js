import { useSelector } from "react-redux";

export const useAppSelector = (reducerName, compareFn) => 
  useSelector(
    state => state[reducerName],
    compareFn || ((prev, next) => prev === next)
  )
