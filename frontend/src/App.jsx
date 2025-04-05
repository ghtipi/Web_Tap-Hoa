import React from 'react';
import { Outlet, Link } from 'react-router-dom';

const App = () => {
    return (
        <div>
            <nav>
                <ul>
                    <li><Link to="/login">Đăng nhập</Link></li>
                    <li><Link to="/signup">Đăng ký</Link></li>
                    <li><Link to="/dashboard">Dashboard</Link></li>
                </ul>
            </nav>
            <hr />
            <Outlet /> 
        </div>
    );
};

export default App;
