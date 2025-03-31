import React from 'react'
import { useState } from "react";
import '../assets/styles/header.scss'
import Logo from '../assets/images/icons/Logo.svg'
import Shop from '../assets/images/icons/shop.png'
import Search from '../assets/images/icons/search.png'


const Header = () => {
  const [query, setQuery] = useState("");
  return (
    <div>
      <header>
        <div className="navbar">
                <div className="logo">
                    <a href="#"><img src={Logo} alt="Logo" /></a>
                </div>
                <div className="search-container">
                    <img  classsName="icon-search" src={Search} alt="icon-search" />
                    <input type="text" placeholder="Bạn cần gì?"/>
                    <p className="wall">|</p>
                    <button className="search-button ">Tìm kiếm</button>
                </div>
                <nav>
                    <ul>
                        <li><a href="#" className="home">Trang chủ</a></li>
                        <li><a href="#" className="account">Tài khoản</a></li>
                    </ul>
                </nav>
                <div className="cart">
                    <a href="#" className="cart"><img src={Shop} alt="Shop" /></a>
                </div>

        </div>
        <div className="dash"/>
      </header>
    </div>
  )
}

export default Header
