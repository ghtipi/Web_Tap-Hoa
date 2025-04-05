import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { authAPI } from '../services/api';

const SignUpForm = () => {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const [email, setEmail] = useState('');
    const [error, setError] = useState('');
    const [loading, setLoading] = useState(false);

    const navigate = useNavigate();

    useEffect(() => {
        // Lấy CSRF token khi component mount
        const fetchCsrfToken = async () => {
            try {
                await authAPI.getCsrfToken();
            } catch (err) {
                console.error('Error getting CSRF token:', err);
            }
        };
        fetchCsrfToken();
    }, []);

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setError('');

        try {
            const response = await authAPI.register({
                name: username,
                password,
                email
            });

            if (response.token) {
                alert('Đăng ký thành công!');
                navigate('/login');
            } else {
                setError(response.message || 'Đăng ký thất bại');
            }
        } catch (err) {
            console.error('Registration error:', err);
            if (err.response) {
                // Lỗi từ server
                setError(err.response.data.message || 'Lỗi đăng ký: ' + JSON.stringify(err.response.data));
            } else if (err.request) {
                // Lỗi kết nối
                setError('Không thể kết nối đến máy chủ');
            } else {
                // Lỗi khác
                setError('Có lỗi xảy ra: ' + err.message);
            }
        } finally {
            setLoading(false);
        }
    };

    return (
        <div>
            <h2>Đăng Ký</h2>
            {error && <p style={{ color: 'red' }}>{error}</p>}
            <form onSubmit={handleSubmit}>
                <input 
                    type="text" 
                    placeholder="Username" 
                    value={username} 
                    onChange={(e) => setUsername(e.target.value)} 
                    required 
                />
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
                <button type="submit" disabled={loading}>
                    {loading ? 'Đang đăng ký...' : 'Đăng Ký'}
                </button>
            </form>
        </div>
    );
};

export default SignUpForm;
