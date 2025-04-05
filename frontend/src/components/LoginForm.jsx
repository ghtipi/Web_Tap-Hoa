import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../contexts/AuthContext';
import { authAPI } from '../services/api';

const LoginForm = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState('');
    const [isLoading, setIsLoading] = useState(false);

    const navigate = useNavigate();
    const { login } = useAuth(); // Gọi hàm login từ context

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        setIsLoading(true);

        try {
            // Ensure we have a CSRF token before attempting login
            await authAPI.getCsrfToken();
            
            const response = await authAPI.login({
                email,
                password
            });

            if (response.token) {
                // Cập nhật context và lưu token
                login(response.token);

                alert('Đăng nhập thành công!');
                navigate('/dashboard'); // Chuyển sang trang dashboard
            } else {
                setError(response.message || 'Đăng nhập thất bại');
            }
        } catch (err) {
            console.error('Login error:', err);
            if (err.response) {
                // Lỗi từ server
                setError(err.response.data.message || 'Lỗi đăng nhập: ' + JSON.stringify(err.response.data));
            } else if (err.request) {
                // Lỗi kết nối
                setError('Không thể kết nối đến máy chủ');
            } else {
                // Lỗi khác
                setError('Có lỗi xảy ra: ' + err.message);
            }
        } finally {
            setIsLoading(false);
        }
    };

    return (
        <div>
            <h2>Đăng Nhập</h2>
            {error && <p style={{ color: 'red' }}>{error}</p>}
            <form onSubmit={handleSubmit}>
                <input 
                    type="email" 
                    placeholder="Email" 
                    value={email} 
                    onChange={(e) => setEmail(e.target.value)} 
                    required 
                />
                <input 
                    type="password" 
                    placeholder="Password" 
                    value={password} 
                    onChange={(e) => setPassword(e.target.value)} 
                    required 
                />
                <button type="submit" disabled={isLoading}>
                    {isLoading ? 'Đang đăng nhập...' : 'Đăng Nhập'}
                </button>
            </form>
        </div>
    );
};

export default LoginForm;
