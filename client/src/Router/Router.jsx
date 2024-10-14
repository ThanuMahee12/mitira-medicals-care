import { createBrowserRouter } from "react-router-dom";
import MasterLayout from "../Layouts/MasterLayout";
import Home from "../Pages/Home";
import NotFound from "../Pages/NotFound";
import AboutUs from "../Pages/AboutUs";

export const router=createBrowserRouter([
{path:"/",
element:<MasterLayout/>,
errorElement:<NotFound/>,
children:[
    {
        index:true,
        path:"/home",
        element:<Home/>
    },
    {
        path:"/about-us",
        element:<AboutUs/>,
    }
]
}
],{
basename:"/mithira"
})