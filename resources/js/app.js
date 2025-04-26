import './bootstrap';
import './priceAutoCalc';
import './navbar';
import './slider';
import './sidebar';
import './star-rating';
import './modal';
import AOS from 'aos';
import 'aos/dist/aos.css';

document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        offset: 120,
        delay: 0,
        duration: 600,
        once: true,
    });


    window.addEventListener('load', () => {
        AOS.refresh();
    });
});
