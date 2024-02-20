import {BrowserRouter, Route, Routes} from 'react-router-dom'


import React from 'react';
import PropTypes from 'prop-types';

const MainRoutes = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route lazy={()=>import("../Login.jsx")} path='/login'/>
        </Routes>
        </BrowserRouter>
    );
}

MainRoutes.propTypes = {};

export default MainRoutes;
