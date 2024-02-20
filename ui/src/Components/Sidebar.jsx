import React from 'react';
import PropTypes from 'prop-types';

const SideBar = ({children}) => {
    return (
        <div>
            SideBar
            {children}
        </div>
    );
}

SideBar.propTypes = {

};

export default memo(SideBar);
