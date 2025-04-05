import React, { createContext, useContext, useState } from 'react';
import api from '../services/api';

// Tạo Context
const AuthContext = createContext();

// Cung cấp Context cho ứng dụng
export const AuthProvider = ({ children }) => {
    const [user, setUser] = useState(() => {
        const token = localStorage.getItem('token');
        if (token) {
            api.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            return { token };
        }
        return null;
    });

    const login = (token) => {
        setUser({ token });
        localStorage.setItem('token', token);
        api.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    };

    const logout = () => {
        setUser(null);
        localStorage.removeItem('token');
        delete api.defaults.headers.common['Authorization'];
    };

    return (
        <AuthContext.Provider value={{ user, login, logout }}>
            {children}
        </AuthContext.Provider>
    );
};

// Hook để sử dụng context
export const useAuth = () => {
    return useContext(AuthContext);
};
