import React, { useState } from 'react';
import { useNavigate, useSearchParams } from 'react-router-dom';
import { authAPI } from '../services/api';

const ResetPasswordForm = () => {
    const [searchParams] = useSearchParams();
    const navigate = useNavigate();
    const [password, setPassword] = useState('');
    const [passwordConfirmation, setPasswordConfirmation] = useState('');
    const [message, setMessage] = useState('');
    const [error, setError] = useState('');
    const [loading, setLoading] = useState(false);

    const token = searchParams.get('token');
    const email = searchParams.get('email');

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (password !== passwordConfirmation) {
            setError('Mật khẩu xác nhận không khớp.');
            return;
        }

        setLoading(true);
        setError('');
        setMessage('');

        try {
            await authAPI.resetPassword({
                token,
                email,
                password,
                password_confirmation: passwordConfirmation
            });
            setMessage('Mật khẩu đã được đặt lại thành công.');
            setTimeout(() => {
                navigate('/login');
            }, 2000);
        } catch (err) {
            setError(err.message || 'Có lỗi xảy ra khi đặt lại mật khẩu.');
        } finally {
            setLoading(false);
        }
    };

    if (!token || !email) {
        return <div>Link không hợp lệ hoặc đã hết hạn.</div>;
    }

    return (
        <div className="reset-password-form">
            <h2>Đặt Lại Mật Khẩu</h2>
            {message && <p className="success-message">{message}</p>}
            {error && <p className="error-message">{error}</p>}
            <form onSubmit={handleSubmit}>
                <div className="form-group">
                    <label htmlFor="password">Mật khẩu mới:</label>
                    <input
                        type="password"
                        id="password"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                        required
                        minLength="8"
                    />
                </div>
                <div className="form-group">
                    <label htmlFor="password_confirmation">Xác nhận mật khẩu:</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        value={passwordConfirmation}
                        onChange={(e) => setPasswordConfirmation(e.target.value)}
                        required
                        minLength="8"
                    />
                </div>
                <button type="submit" disabled={loading}>
                    {loading ? 'Đang xử lý...' : 'Đặt Lại Mật Khẩu'}
                </button>
            </form>
        </div>
    );
};

export default ResetPasswordForm; 