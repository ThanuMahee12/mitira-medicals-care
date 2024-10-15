import React from 'react'
import {Outlet} from 'react-router-dom'
function MasterLayout() {
    return (
        <>
        <h1>Master Layout</h1>
        <Outlet/>
        </>
    )
}

export default MasterLayout
