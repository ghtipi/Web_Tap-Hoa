import React, { useState } from 'react';
import { authAPI } from '../services/api';

const ForgotPasswordForm = () => {
    const [email, setEmail] = useState('');
    const [message, setMessage] = useState('');
    const [error, setError] = useState('');
    const [loading, setLoading] = useState(false);

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setError('');
        setMessage('');

        try {
            const response = await authAPI.forgotPassword(email);
            setMessage('Link đặt lại mật khẩu đã được gửi đến email của bạn.');
            setEmail('');
        } catch (err) {
            setError(err.message || 'Có lỗi xảy ra khi gửi yêu cầu.');
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="forgot-password-form">
            <h2>Quên Mật Khẩu</h2>
            {message && <p className="success-message">{message}</p>}
            {error && <p className="error-message">{error}</p>}
            <form onSubmit={handleSubmit}>
                <div className="form-group">
                    <label htmlFor="email">Email:</label>
                    <input
                        type="email"
                        id="email"
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                        required
                    />
                </div>
                <button type="submit" disabled={loading}>
                    {loading ? 'Đang gửi...' : 'Gửi Link Đặt Lại Mật Khẩu'}
                </button>
            </form>
        </div>
    );
};

export default ForgotPasswordForm; 