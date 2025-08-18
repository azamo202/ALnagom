<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuOverlay = document.getElementById('menuOverlay');
        const closeMenu = document.getElementById('closeMenu');
        
        // فتح وإغلاق القائمة
        hamburger.addEventListener('click', () => {
            hamburger.classList.add('active');
            mobileMenu.classList.add('open');
            menuOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
        
        closeMenu.addEventListener('click', () => {
            closeMobileMenu();
        });
        
        menuOverlay.addEventListener('click', () => {
            closeMobileMenu();
        });
        
        function closeMobileMenu() {
            hamburger.classList.remove('active');
            mobileMenu.classList.remove('open');
            menuOverlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        // إغلاق القائمة عند تغيير حجم الشاشة
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                closeMobileMenu();
            }
        });
    });
    
    // التمرير الأفقي
    function scrollHorizontal(containerId, direction) {
        const container = document.getElementById(containerId);
        const scrollAmount = 300;
        
        if(direction === 'left') {
            container.scrollBy({left: -scrollAmount, behavior: 'smooth'});
        } else {
            container.scrollBy({left: scrollAmount, behavior: 'smooth'});
        }
    }
</script>