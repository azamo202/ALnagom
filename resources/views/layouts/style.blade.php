<!-- إضافة مكتبة Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- إضافة خط Tajawal -->
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

<!-- إضافة أيقونات Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- تنسيقات CSS مخصصة -->
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Tajawal', sans-serif;
        overflow-x: hidden;
    }
    .horizontal-scroll {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
    }
    
    .horizontal-scroll::-webkit-scrollbar {
        display: none;
    }
    
    .product-card {
        transition: all 0.3s ease;
        scroll-snap-align: start;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .offer-section {
        background: linear-gradient(to right, #ff416c, #ff4b2b);
    }
    
    .scroll-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        z-index: 10;
        cursor: pointer;
    }
    
    .scroll-button:hover {
        background: #f8f9fa;
    }
    
    .scroll-button.left {
        left: 10px;
    }
    
    .scroll-button.right {
        right: 10px;
    }
    
    .mobile-menu {
        transform: translateX(100%);
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .mobile-menu.open {
        transform: translateX(0);
    }
    
    .menu-overlay {
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }
    
    .menu-overlay.active {
        opacity: 1;
        visibility: visible;
    }
    
    .menu-item {
        transform: translateX(20px);
        opacity: 0;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    
    .mobile-menu.open .menu-item {
        transform: translateX(0);
        opacity: 1;
        transition-delay: calc(0.1s * var(--i));
    }
    
    .hamburger span {
        transition: all 0.3s ease;
    }
    
    .hamburger.active span:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }
    
    .hamburger.active span:nth-child(2) {
        opacity: 0;
    }
    
    .hamburger.active span:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }
</style>