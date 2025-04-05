import axios from 'axios';

// Cấu hình axios
const api = axios.create({
    baseURL: 'http://127.0.0.1:8000',
    withCredentials: true,
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    }
});

// Interceptor để xử lý lỗi
api.interceptors.response.use(
    response => response,
    error => {
        if (error.response?.status === 401) {
            // Xử lý lỗi unauthorized
            localStorage.removeItem('token');
            window.location.href = '/login';
        }
        return Promise.reject(error);
    }
);

// Auth API
export const authAPI = {
    // Lấy CSRF token
    getCsrfToken: async () => {
        try {
            const response = await api.get('/sanctum/csrf-cookie');
            console.log('CSRF token obtained successfully');
            // Add a small delay to ensure the cookie is set
            await new Promise(resolve => setTimeout(resolve, 100));
            return response;
        } catch (error) {
            console.error('Error getting CSRF token:', error);
            throw error;
        }
    },
    
    // Đăng ký
    register: async (userData) => {
        try {
            await authAPI.getCsrfToken();
            const response = await api.post('/api/register', userData);
            return response.data;
        } catch (error) {
            throw error.response?.data || error.message;
        }
    },

    // Đăng nhập
    login: async (credentials) => {
        try {
            await authAPI.getCsrfToken();
            const response = await api.post('/api/login', credentials);
            if (response.data.token) {
                localStorage.setItem('token', response.data.token);
                api.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;
            }
            return response.data;
        } catch (error) {
            throw error.response?.data || error.message;
        }
    },

    // Đăng xuất
    logout: async () => {
        try {
            const response = await api.post('/api/logout');
            localStorage.removeItem('token');
            delete api.defaults.headers.common['Authorization'];
            return response.data;
        } catch (error) {
            throw error.response?.data || error.message;
        }
    },

    // Lấy thông tin user
    getCurrentUser: async () => {
        try {
            const response = await api.get('/api/user');
            return response.data;
        } catch (error) {
            throw error.response?.data || error.message;
        }
    },

    // Quên mật khẩu
    forgotPassword: async (email) => {
        try {
            const response = await api.post('/api/forgot-password', { email });
            return response.data;
        } catch (error) {
            throw error.response?.data || error.message;
        }
    },

    // Đặt lại mật khẩu
    resetPassword: async (data) => {
        try {
            const response = await api.post('/api/reset-password', data);
            return response.data;
        } catch (error) {
            throw error.response?.data || error.message;
        }
    }
};

// User API
export const userAPI = {
    // Cập nhật thông tin user
    updateProfile: async (userData) => {
        try {
            const response = await api.put('/api/user/profile', userData);
            return response.data;
        } catch (error) {
            throw error.response?.data || error.message;
        }
    },

    // Đổi mật khẩu
    changePassword: async (passwordData) => {
        try {
            const response = await api.put('/api/user/password', passwordData);
            return response.data;
        } catch (error) {
            throw error.response?.data || error.message;
        }
    }
};

// Admin API
export const adminAPI = {
    // Lấy danh sách users
    getUsers: async () => {
        try {
            const response = await api.get('/api/admin/users');
            return response.data;
        } catch (error) {
            throw error.response?.data || error.message;
        }
    },

    // Cập nhật role của user
    updateUserRole: async (userId, role) => {
        try {
            const response = await api.put(`/api/admin/users/${userId}/role`, { role });
            return response.data;
        } catch (error) {
            throw error.response?.data || error.message;
        }
    }
};

export default api; 