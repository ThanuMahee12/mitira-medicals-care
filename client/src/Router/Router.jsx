import { createBrowserRouter } from "react-router-dom";
import MasterLayout from "../Layouts/MasterLayout";
import Home from "../Pages/Home";
import NotFound from "../Pages/NotFound";

export const router=createBrowserRouter([
{path:"/",
element:<MasterLayout/>,
errorElement:<NotFound/>,
children:[
    {
        path:"/home",
        lazy:()=>import("../Pages/Home")
    },
    {
        path:"/about-us",
        lazy:()=>import("../Pages/AboutUs"),
        hydrateFallbackElement:<h1>Loading</h1>
    }
]
}
])