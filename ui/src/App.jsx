import React,{memo} from 'react'
import './style/App.css';
import AppContext from './contexts/AyushContext'
function App() {
  return (
  <AppContext>
    <div className='ayushApp'>
    </div>
	</AppContext>
  );
}

export default memo(App);
