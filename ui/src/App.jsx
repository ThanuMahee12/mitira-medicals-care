import React,{ memo} from 'react'
import './style/App.css';
import AppContext from './contexts/AyushContext'
import Login from './Pages/Login';
function App() {
  return (
    <AppContext>
<Login/>
	</AppContext>
  );
}

export default memo(App);
