import React from 'react';
import { useAuth } from '../contexts/AuthContext';

const Dashboard = () => {
    const { user, logout } = useAuth();

    const handleLogout = () => {
        logout();
        window.location.href = '/login'; // hoặc dùng useHistory nếu bạn dùng react-router v5
    };

    return (
        <div style={{ padding: '20px' }}>
            <h1>Chào mừng đến với Dashboard</h1>
            <p>Bạn đã đăng nhập với token:</p>
            <code>{user?.token}</code>

            <br /><br />
            <button onClick={handleLogout}>Đăng xuất</button>
        </div>
    );
};

export default Dashboard;
