import { useState } from 'react'
import { Route, Router } from 'react-router-dom';
import Home from './pages/Home';
import Header from './parts/Header';

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
    <Header/>
    <Home/>
    </>
  );
}

export default App
