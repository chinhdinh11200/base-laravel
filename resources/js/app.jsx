import ReactDOM from "react-dom/client";

import { useRef } from "react";
import { makeStore } from "./store";
import { Provider } from "react-redux";
import DetailProject from "./pages/DetailProject";

export default function Root() {
    const storeRef = useRef();
    if (!storeRef.current) {
        storeRef.current = makeStore();
    }

    return (
        <Provider store={storeRef.current}>
            <DetailProject />
        </Provider>
    );
}

ReactDOM.createRoot(document.getElementById("root")).render(<Root />);
