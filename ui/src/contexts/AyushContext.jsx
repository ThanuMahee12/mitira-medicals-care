import React from 'react';
import AuthContextProvider from './AuthContext';

export default function AyushContextProvider({children}){
	return (
		<AuthContextProvider>
			{children}
		</AuthContextProvider>
		)
}
