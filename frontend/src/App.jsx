import { useState } from 'react'
import { Route, Router } from 'react-router-dom';
import Home from './pages/Home';
import Header from './components/layouts/Header';
import Footer from './components/layouts/Footer';


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
