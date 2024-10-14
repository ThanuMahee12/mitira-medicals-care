import { RouterProvider } from 'react-router-dom';
import './App.css';
import { router } from './Router/Router';

function App() {
  return (
    <RouterProvider router={router}
    fallbackElement={<h1>Loading...</h1>}
    future={{ v7_startTransition: true }}
    />
  );
}

export default App;
