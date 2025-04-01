import { useState } from 'react'
import { Route, Router } from 'react-router-dom';
import Home from './pages/Home';
import Header from './parts/Header';
import Footer from './parts/Footer';


function App() {
  const [count, setCount] = useState(0)

  return (
    <>
    <Header/>
    <Home/>
    <Footer/>
    </>
  );
}

export default App
