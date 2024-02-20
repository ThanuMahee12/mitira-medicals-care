import React, { createContext, useContext } from 'react';

const AuthContext = createContext( null );

const AuthContextProvider = ({childern}) => {
    return (
        <AuthContext.Provider>
            {childern}
        </AuthContext.Provider>
    );
}


export const UseAuthContext = () =>
{
    return useContext( AuthContext );
}
export default AuthContextProvider;
