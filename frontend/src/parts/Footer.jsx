import React from 'react'
import '../assets/styles/footer.scss'


//import icon
import Logo from '../assets/images/icons/Logo.png'
import Facebook from '../assets/images/icons/facebook.png'
import Instagram from '../assets/images/icons/instagram.png'



const Footer = () => {
  return (
    <div>
      <footer>
        <div className="dash"></div>
        <div class="footer-content">
            <div class="footer-logo">
                <img src={Logo} alt="Logo"/>
            </div>
            <div class="social-icons">
                <a href="https://www.facebook.com/thanh.phat.865487"><img src={Facebook} alt="Facebook-icon" /><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/thanhphat_tipi954/"><img src={Instagram} alt="Instagram-icon"/><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="footer-links">
                <a href="#">Về chúng tôi</a>
                <a href="#">Dịch vụ</a>
                <a href="#">Liên hệ</a>
                <a href="#">Chính sách bảo mật</a>
            </div>
            <div class="copyright">
                &copy; 2025 Tipi. All rights reserved.
            </div>
        </div>
      </footer>
    </div>
  )
}

export default Footer
